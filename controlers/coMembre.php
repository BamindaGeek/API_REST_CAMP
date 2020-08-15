<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 24/05/2020
 * Time: 12:42
 */
require '../tools/tools.php';
require '../class/Action.php';
require '../class/Membre.php';
require '../models/moMembre.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelMembre = new moMembre(); // Instance de la class Model couche d'acces à la BD
$_Membre = new Membre();

if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$SelectAll)
{
    //Traitement de la connexion
    $_Membre -> setAction($_REQUEST_ACTION);
    $_Membre -> setStatus(1);
    $_Response = $_ModelMembre ->CrudMembre($_Membre);

    $_RESPONSE = $tools::getMessageError($_Response);
}
if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['nom']) && !empty($_REQUEST['nom'])  &&
        isset($_REQUEST['prenom']) && !empty($_REQUEST['prenom']) &&
        isset($_REQUEST['communeId']) && !empty($_REQUEST['communeId'])
    ){
        //$_Membre = new Membre();
        $_Membre -> setMembreId(isset($_REQUEST['membreId']) && !empty($_REQUEST['membreId']) ? $_REQUEST['membreId'] : $tools::generateGuid());
        $_Membre -> setNom($_REQUEST['nom']);
        $_Membre -> setPrenom($_REQUEST['prenom']);
        $_Membre -> setEmail($_REQUEST['email']);
        $_Membre -> setContact($_REQUEST['contact']);
        $_Membre -> setSex(isset($_REQUEST['sex']) && !empty($_REQUEST['sex']) ? $_REQUEST['sex'] : 'M');
        $_Membre -> setCommuneId($_REQUEST['communeId']);
        $_Membre -> setLieuVoteId($_REQUEST['lieuVoteId']);
        $_Membre -> setDateNaissance($_REQUEST['dateNaissance']);
        $_Membre -> setLieuNaissance($_REQUEST['lieuNaissance']);
        $_Membre -> setAdressePhysique($_REQUEST['adressePhysique']);
        $_Membre -> setAdressePostale(isset($_REQUEST['adressePostale']) && !empty($_REQUEST['adressePostale']) ? $_REQUEST['adressePostale'] : '225');
        $_Membre -> setProfession($_REQUEST['profession']);
        $_Membre -> setTypeMembreId($_REQUEST['typeMembreId']);
        $_Membre -> setStatus($tools::$enabled);
        $_Membre -> setAction($_REQUEST_ACTION);
        //Insertion en base
        $_Response = $_ModelMembre ->CrudMembre($_Membre);
        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else{
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$DeleteById)
{
    if(isset($_REQUEST['MembreId'])){
        //Traitement de la connexion
        $_Membre = new Membre();
        $_Membre -> setAction($_REQUEST_ACTION);
        $_Membre -> setMembreId($_REQUEST['membreId']);
        $_Response = $_ModelMembre ->CrudMembre($_Membre);

        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$Filtre)
{
    if(isset($_REQUEST['valeur'])){
        //Traitement de la connexion
        $_Membre -> setAction($_REQUEST_ACTION);
        $_Membre -> setMembreId($_REQUEST['valeur']);
        $_Response = $_ModelMembre ->CrudMembre($_Membre);
        $_RESPONSE = $tools::getMessageError($_Response);
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

echo json_encode($_RESPONSE);