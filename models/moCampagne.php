<?php

include 'bdd.php';
class moCampagne extends bdd
{
    public function CrudCampagne(Campagne $campagne)
    {
        $this->Query='CALL ps_Campagne (:campagneId,
                                        :libelle,
                                        :status,
                                        :createBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'campagneId'=>$campagne->getcampagneId(),
                    'libelle'=>$campagne->getLibelle(),
                    'status'=>$campagne->getStatus(),
                    'createBy'=>$campagne->getCreateBy(),
                    'Action'=>$campagne->getAction()
                )
            );

            switch ($campagne->getAction()){
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