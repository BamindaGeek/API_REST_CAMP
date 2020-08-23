<?php

include 'messageError.php';
class AffectationObjectif extends messageError
{
    private $id;
    private $affectationobjectifId;
    private $objectifId;
    private $sousPrefectureId;
    private $valeur;
    private $deadline;
    private $comment;
    private $status;
    private $createBy;
    private $createOn;
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
    public function getAffectationobjectifId()
    {
        return $this->affectationobjectifId;
    }

    /**
     * @param mixed $affectationobjectifId
     */
    public function setAffectationobjectifId($affectationobjectifId)
    {
        $this->affectationobjectifId = $affectationobjectifId;
    }

    /**
     * @return mixed
     */
    public function getObjectifId()
    {
        return $this->objectifId;
    }

    /**
     * @param mixed $objectifId
     */
    public function setObjectifId($objectifId)
    {
        $this->objectifId = $objectifId;
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
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * @param mixed $valeur
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    }

    /**
     * @return mixed
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param mixed $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
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
