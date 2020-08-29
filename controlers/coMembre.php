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

if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['nom']) && !empty($_REQUEST['nom'])  &&
        isset($_REQUEST['prenom']) && !empty($_REQUEST['prenom']) &&
        isset($_REQUEST['sex']) && !empty($_REQUEST['sex'])  &&
        isset($_REQUEST['dateNaissance']) && !empty($_REQUEST['dateNaissance']) &&
        isset($_REQUEST['lieuNaissance']) && !empty($_REQUEST['lieuNaissance']) &&
        isset($_REQUEST['profession']) && !empty($_REQUEST['profession']) &&
        isset($_REQUEST['communeId']) && !empty($_REQUEST['communeId']) &&
        isset($_REQUEST['comiteBaseId']) && !empty($_REQUEST['comiteBaseId'])
    ){
        //$_Membre = new Membre();
        $_Membre -> setMembreId(isset($_REQUEST['membreId']) && !empty($_REQUEST['membreId']) ? $_REQUEST['membreId'] : $tools::generateGuid());
        $_Membre -> setNumeroElecteur(isset($_REQUEST['numeroElecteur']) && !empty($_REQUEST['numeroElecteur']) ?$_REQUEST['numeroElecteur']:null);
        $_Membre -> setNumeroCNI(isset($_REQUEST['numeroCNI']) && !empty($_REQUEST['numeroCNI']) ?$_REQUEST['numeroCNI']:null);
        $_Membre -> setNom($_REQUEST['nom']);
        $_Membre -> setPrenom($_REQUEST['prenom']);
        $_Membre -> setEmail(isset($_REQUEST['email']) && !empty($_REQUEST['email']) ? $_REQUEST['email']:null);
        $_Membre -> setContact(isset($_REQUEST['contact']) && !empty($_REQUEST['contact']) ? $_REQUEST['contact']:null);
        $_Membre -> setSex(isset($_REQUEST['sex']) && !empty($_REQUEST['sex']) ? $_REQUEST['sex'] : 'M');
        $_Membre -> setCommuneId($_REQUEST['communeId']);
        $_Membre -> setComiteBaseId($_REQUEST['comiteBaseId']);
        $_Membre -> setLieuVoteId(isset($_REQUEST['lieuVoteId']) && !empty($_REQUEST['lieuVoteId']) ? $_REQUEST['lieuVoteId']:null);
        $_Membre -> setDateNaissance($_REQUEST['dateNaissance']);
        $_Membre -> setLieuNaissance($_REQUEST['lieuNaissance']);
        $_Membre -> setAdressePhysique(isset($_REQUEST['adressePhysique']) && !empty($_REQUEST['adressePhysique']) ? $_REQUEST['adressePhysique']:null);
        $_Membre -> setAdressePostale(isset($_REQUEST['adressePostale']) && !empty($_REQUEST['adressePostale']) ? $_REQUEST['adressePostale'] : '225');
        $_Membre -> setProfession($_REQUEST['profession']);
        $_Membre -> setNomPere(isset($_REQUEST['nomPere']) && !empty($_REQUEST['nomPere']) ? $_REQUEST['nomPere']:null);
        $_Membre -> setPrenomPere(isset($_REQUEST['prenomPere']) && !empty($_REQUEST['prenomPere']) ? $_REQUEST['prenomPere']:null);
        $_Membre -> setDateNaissancePere(isset($_REQUEST['dateNaissancePere']) && !empty($_REQUEST['dateNaissancePere']) ? $_REQUEST['dateNaissancePere']:null);
        $_Membre -> setLieuNaissancePere(isset($_REQUEST['lieuNaissancePere']) && !empty($_REQUEST['lieuNaissancePere']) ? $_REQUEST['lieuNaissancePere']:null);
        $_Membre -> setNomMere(isset($_REQUEST['nomMere']) && !empty($_REQUEST['nomMere']) ? $_REQUEST['nomMere']:null);
        $_Membre -> setPrenomMere(isset($_REQUEST['prenomMere']) && !empty($_REQUEST['prenomMere']) ? $_REQUEST['prenomMere']:null);
        $_Membre -> setDateNaissanceMere(isset($_REQUEST['dateNaissanceMere']) && !empty($_REQUEST['dateNaissanceMere']) ? $_REQUEST['dateNaissanceMere']:null);
        $_Membre -> setLieuNaissanceMere(isset($_REQUEST['lieuNaissanceMere']) && !empty($_REQUEST['lieuNaissanceMere']) ? $_REQUEST['lieuNaissanceMere']:null);
        $_Membre -> setStatus($tools::$enabled);
        $_Membre -> setAction($_REQUEST_ACTION);
        $_Membre -> setCreateBy($_REQUEST['createdBy']);
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
    if(isset($_REQUEST['membreId'])){
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

if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$Rechercher || $_REQUEST_ACTION == $_ACTION::$SelectById)
{
    if(isset($_REQUEST['valeur'])){
        //Traitement de la connexion
        $_Membre -> setAction($_REQUEST_ACTION);
        $_Membre -> setMembreId($_REQUEST['valeur']);
        $_Membre -> setNumeroElecteur($_REQUEST['valeur']);
        $_Response = $_ModelMembre ->CrudMembre($_Membre);
        //print_r($_Response);
        $_RESPONSE = $tools::getMessageError($_Response != null && $_Response != 1 && sizeof($_Response) > 0 ? $_Response : array());
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$Retrouver)
{
    if(isset($_REQUEST['valeur'])){
        //Traitement de la connexion
        $_Membre -> setAction($_REQUEST_ACTION);
        $_Membre -> setNumeroElecteur(isset($_REQUEST['numeroElecteur']) && !empty($_REQUEST['numeroElecteur']) ?$_REQUEST['numeroElecteur']:null);
        $_Membre -> setNom(isset($_REQUEST['nom']) && !empty($_REQUEST['nom']) ?$_REQUEST['nom']:null);
        $_Membre -> setPrenom(isset($_REQUEST['prenom']) && !empty($_REQUEST['prenom']) ?$_REQUEST['prenom']:null);
        $_Membre -> setDateNaissance(isset($_REQUEST['dateNaissance']) && !empty($_REQUEST['dateNaissance']) ?$_REQUEST['dateNaissance']:null);
        $_Response = $_ModelMembre ->CrudMembre($_Membre);
        //print_r($_Response);
        $_RESPONSE = $tools::getMessageError($_Response != null && $_Response != 1 && sizeof($_Response) > 0 ? $_Response : array());
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$SelectAllBy)
{
    if(isset($_REQUEST['valeur'])){
        //Traitement de la connexion
        $_Membre -> setAction($_REQUEST_ACTION);
        $_Membre -> setMembreId($_REQUEST['valeur']);
        $_Response = $_ModelMembre ->CrudMembre($_Membre);
        $_RESPONSE = $tools::getMessageError($_Response != null && $_Response != 1 && sizeof($_Response) > 0 ? $_Response : array());
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$SelectAll)
{
    //Traitement de la connexion
    $_Membre -> setAction($_REQUEST_ACTION);
    $_Membre -> setStatus(1);
    $_Response = $_ModelMembre ->CrudMembre($_Membre);

    $_RESPONSE = $tools::getMessageError($_Response);
}

if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$Filtre)
{
    if(isset($_REQUEST['valeur'])){
        //Traitement de la connexion
        $_Membre -> setAction($_REQUEST_ACTION);
        $_Membre -> setMembreId($_REQUEST['valeur']);
        $_Response = $_ModelMembre ->CrudMembre($_Membre);
        $_RESPONSE = $tools::getMessageError($_Response != null && $_Response != 1 && sizeof($_Response) > 0 ? $_Response : array());
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

echo json_encode($_RESPONSE);
