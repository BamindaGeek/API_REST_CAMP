<?php

include 'bdd.php';

class moSousPrefecture extends bdd
{
    public function CrudSousPrefecture (SousPrefecture  $sousPrefecture)
    {
        $this->Query='CALL ps_SousPrefecture (:sousPrefectureId,
                                        :libelle,
                                        :departementId,
                                        :status,
                                        :createdBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'sousPrefectureId'=>$sousPrefecture->getSousPrefectureId(),
                    'libelle'=>$sousPrefecture->getLibelle(),
                    'departementId'=>$sousPrefecture->getDepartementId(),
                    'status'=>$sousPrefecture->getStatus(),
                    'createdBy'=>$sousPrefecture->getCreatedBy(),
                    'Action'=>$sousPrefecture->getAction()
                )
            );

            switch ($sousPrefecture->getAction()){
                case $this::$Filtre:
                case $this::$SelectAll:
                case $this::$SelectById:
                    $this->Response = $PDOprepare -> fetchAll();
                    break;
                /*case $this::$SelectById:
                    $this->Response = $PDOprepare -> fetch();
                    break;*/
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
