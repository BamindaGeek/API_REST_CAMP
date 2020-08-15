<?php

include 'bdd.php';
class moAffectation extends bdd
{
    public function CrudAffectation (Affectation $affectation){
        $this->Query='CALL ps_Affectation (  :affectationId,
                                            :acteurId,
                                            :blocId,
                                            :type,
                                            :status,
                                            :createBy,
                                            :Action)';

        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'affectationId'=>$affectation->getAffectationId(),
                    'acteurId'=>$affectation->getActeurId(),
                    'blocId'=>$affectation->getBlocId(),
                    'type'=>$affectation->getType(),
                    'status'=>$affectation->getStatus(),
                    'createBy'=>$affectation->getCreateBy(),
                    'Action'=>$affectation->getAction()
                )
            );

            switch ($affectation->getAction()){
                case $this::$Filtre:
                case $this::$SelectAll:
                    $this->Response = $PDOprepare -> fetchAll();
                    break;
                case $this::$SelectById:
                    $this->Response = $PDOprepare -> fetch();
                    break;
                case $this::$UpdateById:
                case $this::$Insert:
                    $this->Response = 1;
                    break;
                default:
                    $this->Response = 2;
                    break;
            }

            $PDOprepare -> closecursor();

            $this -> commitTrans();

            return $this->Response;
        }
        catch (PDOException $e)
        {
            $this -> rollbackTrans();

            $Msg = $this->errorMsg($e);

            return $this->ResponseError;
        }
    }
}