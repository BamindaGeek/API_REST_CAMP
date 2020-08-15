<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 24/05/2020
 * Time: 12:02
 */
include "messageError.php";
class Personne extends messageError
{
    private $id;
    private $PersonneId;
    private $FistName;
    private $LastName;
    private $Email;
    private $Phone;
    private $Location;
    private $Gender;
    private $jobTitle;
    private $birthDate;
    private $status;
    private $Action;

    /**
     * Personne constructor.
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
    public function getPersonneId()
    {
        return $this->PersonneId;
    }

    /**
     * @param mixed $PersonneId
     */
    public function setPersonneId($PersonneId)
    {
        $this->PersonneId = $PersonneId;
    }

    /**
     * @return mixed
     */
    public function getFistName()
    {
        return $this->FistName;
    }

    /**
     * @param mixed $FistName
     */
    public function setFistName($FistName)
    {
        $this->FistName = $FistName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @param mixed $LastName
     */
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->Phone;
    }

    /**
     * @param mixed $Phone
     */
    public function setPhone($Phone)
    {
        $this->Phone = $Phone;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->Location;
    }

    /**
     * @param mixed $Location
     */
    public function setLocation($Location)
    {
        $this->Location = $Location;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->Gender;
    }

    /**
     * @param mixed $Gender
     */
    public function setGender($Gender)
    {
        $this->Gender = $Gender;
    }

    /**
     * @return mixed
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * @param mixed $jobTitle
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }

    /**
     * @return mixed
     */
    public function getbirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     */
    public function setbirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * @param mixed $Status
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->Action;
    }

    /**
     * @param mixed $Action
     */
    public function setAction($Action)
    {
        $this->Action = $Action;
    }

    /**
     * @return mixed
     */
    /*public function getMessageError()
    {
        return $this->messageError;
    }*/

    /**
     * @param mixed $messageError
     */
    /*public function setMessageError($messageError)
    {
        $this->messageError = $messageError;
    }*/

}