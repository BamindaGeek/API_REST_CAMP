<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 24/05/2020
 * Time: 12:02
 */
include "messageError.php";
class Membre extends messageError
{
    private $id;
    private $membreId;
    private $nom;
    private $prenom;
    private $email;
    private $contact;
    private $sex;
    private $communeId;
    private $lieuVoteId;
    private $dateNaissance;
    private $lieuNaissance;
    private $adressePhysique;
    private $adressePostale;
    private $profession;
    private $typeMembreId;
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param mixed $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getCommuneId()
    {
        return $this->communeId;
    }

    /**
     * @param mixed $communeId
     */
    public function setCommuneId($communeId)
    {
        $this->communeId = $communeId;
    }

    /**
     * @return mixed
     */
    public function getLieuVoteId()
    {
        return $this->lieuVoteId;
    }

    /**
     * @param mixed $lieuVoteId
     */
    public function setLieuVoteId($lieuVoteId)
    {
        $this->lieuVoteId = $lieuVoteId;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param mixed $dateNaissance
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return mixed
     */
    public function getLieuNaissance()
    {
        return $this->lieuNaissance;
    }

    /**
     * @param mixed $lieuNaissance
     */
    public function setLieuNaissance($lieuNaissance)
    {
        $this->lieuNaissance = $lieuNaissance;
    }

    /**
     * @return mixed
     */
    public function getAdressePhysique()
    {
        return $this->adressePhysique;
    }

    /**
     * @param mixed $adressePhysique
     */
    public function setAdressePhysique($adressePhysique)
    {
        $this->adressePhysique = $adressePhysique;
    }

    /**
     * @return mixed
     */
    public function getAdressePostale()
    {
        return $this->adressePostale;
    }

    /**
     * @param mixed $adressePostale
     */
    public function setAdressePostale($adressePostale)
    {
        $this->adressePostale = $adressePostale;
    }

    /**
     * @return mixed
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * @param mixed $profession
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;
    }

    /**
     * @return mixed
     */
    public function getTypeMembreId()
    {
        return $this->typeMembreId;
    }

    /**
     * @param mixed $typeMembreId
     */
    public function setTypeMembreId($typeMembreId)
    {
        $this->typeMembreId = $typeMembreId;
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