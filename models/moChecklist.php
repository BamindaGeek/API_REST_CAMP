<?php

include 'bdd.php';
class moChecklist extends bdd
{
    public function CrudChecklist(Checklist $checklist)
    {
        $this->Query='CALL ps_Checklist (:checkListId,
                                        :affectationMissionId,
                                        :membreId,
                                        :etat,
                                        :status,
                                        :createdBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'checkListId'=>$checklist->getCheckListId(),
                    'affectationMissionId'=>$checklist->getAffectationMissionId(),
                    'membreId'=>$checklist->getMembreId(),
                    'etat'=>$checklist->getEtat(),
                    'status'=>$checklist->getStatus(),
                    'createdBy'=>$checklist->getCreateBy(),
                    'Action'=>$checklist->getAction()
                )
            );

            switch ($checklist->getAction()){
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
