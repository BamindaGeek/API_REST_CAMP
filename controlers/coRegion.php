<?php

require '../tools/tools.php';
require '../class/Action.php';
require '../class/Region.php';
require '../models/moRegion.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelRegion = new moRegion(); // Instance de la class Model couche d'acces à la BD
$_Region = new Region();

if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$Filtre || $_REQUEST_ACTION == $_ACTION::$SelectById)
{
    if(isset($_REQUEST['valeur'])){
        //Traitement de la connexion
        $_Region -> setAction($_REQUEST_ACTION);
        $_Region -> setDistrictId($_REQUEST['valeur']);
        $_Response = $_ModelRegion ->CrudRegion($_Region);
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
    $_Region -> setAction($_REQUEST_ACTION);
    $_Response = $_ModelRegion ->CrudRegion($_Region);
    $_RESPONSE = $tools::getMessageError($_Response);
}

echo json_encode($_RESPONSE);

