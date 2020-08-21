<?php

require '../tools/tools.php';
require '../class/Action.php';
require '../class/SousPrefecture.php';
require '../models/moSousPrefecture.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelSousPrefecture = new moSousPrefecture(); // Instance de la class Model couche d'acces à la BD
$_SousPrefecture = new SousPrefecture();

if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$Filtre || $_REQUEST_ACTION == $_ACTION::$SelectById)
{
    if(isset($_REQUEST['valeur'])){
        //Traitement de la connexion
        $_SousPrefecture -> setAction($_REQUEST_ACTION);
        $_SousPrefecture -> setDepartementId($_REQUEST['valeur']);
        $_Response = $_ModelSousPrefecture ->CrudSousPrefecture($_SousPrefecture);
        $_RESPONSE = $tools::getMessageError($_Response != null && $_Response != 1 && sizeof($_Response) > 0 ? $_Response : array());
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

if($_REQUEST_ACTION != null &&  $_REQUEST_ACTION == $_ACTION::$SelectAll)
{
    //Traitement de la connexion
    $_SousPrefecture -> setAction($_REQUEST_ACTION);
    $_Response = $_ModelSousPrefecture ->CrudSousPrefecture($_SousPrefecture);
    $_RESPONSE = $tools::getMessageError($_Response);
}

echo json_encode($_RESPONSE);

