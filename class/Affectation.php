<?php

include "messageError.php";
class Affectation extends messageError
{
    private $id;
    private $affectationId;
    private $acteurId;
    private $blocId;
    private $type;
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
    public function getAffectationId()
    {
        return $this->affectationId;
    }

    /**
     * @param mixed $affectationId
     */
    public function setAffectationId($affectationId)
    {
        $this->affectationId = $affectationId;
    }

    /**
     * @return mixed
     */
    public function getActeurId()
    {
        return $this->acteurId;
    }

    /**
     * @param mixed $acteurId
     */
    public function setActeurId($acteurId)
    {
        $this->acteurId = $acteurId;
    }

    /**
     * @return mixed
     */
    public function getBlocId()
    {
        return $this->blocId;
    }

    /**
     * @param mixed $blocId
     */
    public function setBlocId($blocId)
    {
        $this->blocId = $blocId;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
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