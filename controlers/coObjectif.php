<?php

require '../tools/tools.php';
require '../class/Action.php';
require '../class/Objectif.php';
require '../models/moObjectif.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelObjectif = new moObjectif(); // Instance de la class Model couche d'acces à la BD
$_Objectif = new Objectif();

if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['libelle']) && !empty($_REQUEST['libelle']) &&
        isset($_REQUEST['code']) && !empty($_REQUEST['code'])
    ){
        //$_Objectif = new Objectif();
        $_Objectif -> setObjectifId(isset($_REQUEST['objectifId']) && !empty($_REQUEST['objectifId']) ? $_REQUEST['objectifId'] : $tools::generateGuid());
        $_Objectif -> setLibelle($_REQUEST['libelle']);
        $_Objectif -> setCode($_REQUEST['code']);
        $_Objectif -> setStatus($tools::$enabled);
        $_Objectif -> setAction($_REQUEST_ACTION);
        $_Objectif->setCreateBy($_REQUEST['createdBy']);
        //Insertion en base
        $_Response = $_ModelObjectif ->CrudObjectif($_Objectif);
        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else{
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$DeleteById)
{
    if(isset($_REQUEST['objectifId'])){
        //Traitement de la connexion
        $_Objectif = new Objectif();
        $_Objectif -> setAction($_REQUEST_ACTION);
        $_Objectif -> setObjectifId($_REQUEST['objectifId']);
        $_Response = $_ModelObjectif ->CrudObjectif($_Objectif);

        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$Filtre  || $_REQUEST_ACTION == $_ACTION::$SelectById)
{
    if(isset($_REQUEST['valeur'])){
        //Traitement de la connexion
        $_Objectif -> setAction($_REQUEST_ACTION);
        $_Objectif -> setObjectifId($_REQUEST['valeur']);
        $_Response = $_ModelObjectif ->CrudObjectif($_Objectif);
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
    $_Objectif -> setAction($_REQUEST_ACTION);
    $_Response = $_ModelObjectif ->CrudObjectif($_Objectif);
    $_RESPONSE = $tools::getMessageError($_Response);
}

echo json_encode($_RESPONSE);

