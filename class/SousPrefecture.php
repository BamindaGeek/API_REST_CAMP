<?php

include 'messageError.php';
class SousPrefecture extends messageError
{
    private $id;
    private $sousPrefectureId;
    private $libelle;
    private $departementId;
    private $status;
    private $createdBy;
    private $createdOn;
    private $action;

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
    public function getSousPrefectureId()
    {
        return $this->sousPrefectureId;
    }

    /**
     * @param mixed $sousPrefectureId
     */
    public function setSousPrefectureId($sousPrefectureId)
    {
        $this->sousPrefectureId = $sousPrefectureId;
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
    public function getDepartementId()
    {
        return $this->departementId;
    }

    /**
     * @param mixed $departementId
     */
    public function setDepartementId($departementId)
    {
        $this->departementId = $departementId;
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
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param mixed $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return mixed
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @param mixed $createdOn
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
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
