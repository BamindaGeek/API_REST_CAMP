<?php

include 'bdd.php';
class moObjectif extends bdd
{

    public function CrudObjectif(Objectif $objectif)
    {
        $this->Query='CALL ps_Objectif(:objectifId,
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
                    'objectifId'=>$objectif->getObjectifId(),
                    'libelle'=>$objectif->getLibelle(),
                    'code'=>$objectif->getCode(),
                    'status'=>$objectif->getStatus(),
                    'createdBy'=>$objectif->getCreateBy(),
                    'Action'=>$objectif->getAction()
                )
            );

            switch ($objectif->getAction()){
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
