<?php

include 'messageError.php';
class Campagne extends messageError
{
    private $id;
    private $campagneId;
    private $libelle;
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
    public function getCampagneId()
    {
        return $this->campagneId;
    }

    /**
     * @param mixed $campagneId
     */
    public function setCampagneId($campagneId)
    {
        $this->campagneId = $campagneId;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
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