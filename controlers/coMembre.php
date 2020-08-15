<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 24/05/2020
 * Time: 12:42
 */
require '../tools.php';
require '../class/Action.php';
require '../class/Personne.php';
require '../models/moPersonne.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelPersonne = new moPersonne(); // Instance de la class Model couche d'acces à la BD
$_Personne = new Personne();
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$SelectAll)
{
    //Traitement de la connexion
    $_Personne -> setAction($_REQUEST_ACTION);
    $_Personne -> setStatus(1);
    $_Response = $_ModelPersonne ->CrudPersonnes($_Personne, $_ACTION);
    $_RESPONSE = $tools::getMessageError($_Response);
}
if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['FistName']) && !empty($_REQUEST['FistName'])  &&
        isset($_REQUEST['LastName']) && !empty($_REQUEST['LastName']) &&
        isset($_REQUEST['Email']) && !empty($_REQUEST['Email']) &&
        isset($_REQUEST['Contact']) && !empty($_REQUEST['Contact'])
    ){
        //$_Personne = new Personne();
        $_Personne -> setPersonneId(isset($_REQUEST['PersonneId']) && !empty($_REQUEST['PersonneId']) ? $_REQUEST['PersonneId'] : $tools::generateGuid());
        $_Personne -> setFistName($_REQUEST['FistName']);
        $_Personne -> setLastName($_REQUEST['LastName']);
        $_Personne -> setEmail($_REQUEST['Email']);
        $_Personne -> setContact($_REQUEST['Contact']);
        $_Personne -> setCodePostal(isset($_REQUEST['codePostal']) && !empty($_REQUEST['codePostal']) ? $_REQUEST['codePostal'] : '225');
        $_Personne -> setSexe(isset($_REQUEST['Sexe']) && !empty($_REQUEST['Sexe']) ? $_REQUEST['Sexe'] : 'M');
        $_Personne -> setStatut($tools::$enabled);
        $_Personne -> setAction($_REQUEST_ACTION);
        //Insertion en base
        $_Response = $_ModelPersonne ->CrudPersonnes($_Personne, $_ACTION);
        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else{
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$DeleteById)
{
    if(isset($_REQUEST['personneId'])){
        //Traitement de la connexion
        $_Personne = new Personne();
        $_Personne -> setAction($_REQUEST_ACTION);
        $_Personne -> setPersonneId($_REQUEST['personneId']);
        $_Response = $_ModelPersonne ->CrudPersonnes($_Personne, $_ACTION);

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
        $_Personne -> setAction($_REQUEST_ACTION);
        $_Personne -> setPersonneId($_REQUEST['valeur']);
        $_Response = $_ModelPersonne ->CrudPersonnes($_Personne, $_ACTION);
        $_RESPONSE = $tools::getMessageError($_Response);
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

echo json_encode($_RESPONSE);