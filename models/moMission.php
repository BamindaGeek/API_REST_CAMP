<?php

include 'bdd.php';
class moMission extends bdd
{
    public function CrudMission(Mission $mission)
    {
        $this->Query='CALL ps_Mission (:missionId,
                                        :libelle,
                                        :checkList,
                                        :status,
                                        :createdBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'missionId'=>$mission->getmissionId(),
                    'libelle'=>$mission->getLibelle(),
                    'checkList'=>$mission->getCheckList(),
                    'status'=>$mission->getStatus(),
                    'createdBy'=>$mission->getCreateBy(),
                    'Action'=>$mission->getAction()
                )
            );

            switch ($mission->getAction()){
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
