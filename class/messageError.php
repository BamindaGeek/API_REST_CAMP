<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 09/07/2020
 * Time: 14:21
 */

class messageError
{
    private $idmsg;
    private $code;
    private $libelle;

    /**
     * messageError constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdmsg()
    {
        return $this->idmsg;
    }

    /**
     * @param mixed $idmsg
     */
    public function setIdmsg($idmsg)
    {
        $this->idmsg = $idmsg;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
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

}