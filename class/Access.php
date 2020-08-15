<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 21/08/2019
 * Time: 10:46
 */
include 'Personne.php';
class Access extends Personne
{
    private $ID;
    private $AccessID;
    private $Pseudo;
    private $Password;
    private $CreateOn;
    private $Expired;
    private $Status;
    private $Action;

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getAccessID()
    {
        return $this->AccessID;
    }

    /**
     * @param mixed $AccessID
     */
    public function setAccessID($AccessID)
    {
        $this->AccessID = $AccessID;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->Pseudo;
    }

    /**
     * @param mixed $Pseudo
     */
    public function setPseudo($Pseudo)
    {
        $this->Pseudo = $Pseudo;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password)
    {
        //$this->Password = hash("sha256", "$@_t°".$Password."ùôQ$");
        $this->Password = $Password;

         //$this->Password = $Password;
    }

    /**
     * @return mixed
     */
    public function getCreateOn()
    {
        return $this->CreateOn;
    }

    /**
     * @param mixed $CreateOn
     */
    public function setCreateOn($CreateOn)
    {
        $this->CreateOn = $CreateOn;
    }

    /**
     * @return mixed
     */
    public function getExpired()
    {
        return $this->Expired;
    }

    /**
     * @param mixed $Expired
     */
    public function setExpired($Expired)
    {
        $this->Expired = $Expired;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * @param mixed $UserID
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

}