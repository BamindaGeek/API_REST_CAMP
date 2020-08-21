<?php

require '../tools/tools.php';
require '../class/Action.php';
require '../class/District.php';
require '../models/moDistrict.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelDistrict = new moDistrict(); // Instance de la class Model couche d'acces à la BD
$_District = new District();

if($_REQUEST_ACTION != null &&  $_REQUEST_ACTION == $_ACTION::$SelectAll)
{
    //Traitement de la connexion
    $_District -> setAction($_REQUEST_ACTION);
    $_Response = $_ModelDistrict ->CrudDistrict($_District);
    $_RESPONSE = $tools::getMessageError($_Response);
}

echo json_encode($_RESPONSE);

