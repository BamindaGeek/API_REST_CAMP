<?php

include 'bdd.php';
class moAffectationMission extends bdd
{
    public function CrudAffectationMission (AffectationMission $affectationMission){
        $this->Query='CALL ps_AffectationMission (:affectationMissionId,
                                        :missionId,
                                        :membreId,
                                        :status,
                                        :createBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'affectationMissionId'=>$affectationMission->getAffectationMissionId(),
                    'missionId'=>$affectationMission->getMissionId(),
                    'membreId'=>$affectationMission->getMembreId(),
                    'status'=>$affectationMission->getStatus(),
                    'createBy'=>$affectationMission->getCreateBy(),
                    'Action'=>$affectationMission->getAction()
                )
            );

            switch ($affectationMission->getAction()){
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