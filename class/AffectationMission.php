<?php

include 'messageError.php';
class AffectationMission extends messageError
{
    private $id;
    private $affectationMissionId;
    private $missionId;
    private $membreId;
    private $status;
    private $createBy;
    private $createOn;
    private $action;

    /**
     * Membre constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAffectationMissionId()
    {
        return $this->affectationMissionId;
    }

    /**
     * @param mixed $affectationMissionId
     */
    public function setAffectationMissionId($affectationMissionId)
    {
        $this->affectationMissionId = $affectationMissionId;
    }

    /**
     * @return mixed
     */
    public function getMissionId()
    {
        return $this->missionId;
    }

    /**
     * @param mixed $missionId
     */
    public function setMissionId($missionId)
    {
        $this->missionId = $missionId;
    }

    /**
     * @return mixed
     */
    public function getMembreId()
    {
        return $this->membreId;
    }

    /**
     * @param mixed $membreId
     */
    public function setMembreId($membreId)
    {
        $this->membreId = $membreId;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCreateBy()
    {
        return $this->createBy;
    }

    /**
     * @param mixed $createBy
     */
    public function setCreateBy($createBy)
    {
        $this->createBy = $createBy;
    }

    /**
     * @return mixed
     */
    public function getCreateOn()
    {
        return $this->createOn;
    }

    /**
     * @param mixed $createOn
     */
    public function setCreateOn($createOn)
    {
        $this->createOn = $createOn;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }



}