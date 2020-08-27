<?php

include 'bdd.php';
class moAffectationObjectif extends bdd
{
    public function CrudAffectationObjectif(AffectationObjectif $affectationObjectif){
        $this->Query='CALL ps_AffectationObjectif (:affectationObjectifId,
                                        :objectifId,
                                        :departementId,
                                        :valeur,
                                        :deadline,
                                        :comment,
                                        :status,
                                        :createdBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'affectationObjectifId'=>$affectationObjectif->getAffectationobjectifId(),
                    'objectifId'=>$affectationObjectif->getObjectifId(),
                    'departementId'=>$affectationObjectif->getDepartementId(),
                    'valeur'=>$affectationObjectif->getValeur(),
                    'deadline'=>$affectationObjectif->getDeadline(),
                    'comment'=>$affectationObjectif->getComment(),
                    'status'=>$affectationObjectif->getStatus(),
                    'createdBy'=>$affectationObjectif->getCreateBy(),
                    'Action'=>$affectationObjectif->getAction()
                )
            );

            switch ($affectationObjectif->getAction()){
                case $this::$Filtre:
                case $this::$SelectAll:
                case $this::$SelectAllBy:
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
