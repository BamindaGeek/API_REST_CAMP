<?php

include 'bdd.php';
class moTypeMembre extends bdd
{
    public function CrudTypeMembre(TypeMembre $typeMembre)
    {
        $this->Query='CALL ps_TypeMembre (:typeMembreId,
                                        :libelle,
                                        :code,
                                        :status,
                                        :createdBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'typeMembreId'=>$typeMembre->gettypeMembreId(),
                    'libelle'=>$typeMembre->getLibelle(),
                    'code'=>$typeMembre->getCode(),
                    'status'=>$typeMembre->getStatus(),
                    'createdBy'=>$typeMembre->getCreateBy(),
                    'Action'=>$typeMembre->getAction()
                )
            );

            switch ($typeMembre->getAction()){
                case $this::$Filtre:
                case $this::$SelectAll:
                    $this->Response = $PDOprepare -> fetchAll();
                    break;
                case $this::$SelectById:
                    $this->Response = $PDOprepare -> fetch();
                    break;
                case $this::$DeleteById:
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
