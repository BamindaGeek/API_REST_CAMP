<?php

require '../tools/tools.php';
require '../class/Action.php';
require '../class/Parti.php';
require '../models/moParti.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelParti = new moParti(); // Instance de la class Model couche d'acces à la BD
$_Parti = new Parti();

if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['libelle']) && !empty($_REQUEST['libelle'])  &&
        isset($_REQUEST['createdBy']) && !empty($_REQUEST['createdBy'])
    ){
        //$_Parti = new Parti();
        $_Parti -> setPartiId(isset($_REQUEST['partiId']) && !empty($_REQUEST['partiId']) ? $_REQUEST['partiId'] : $tools::generateGuid());
        $_Parti -> setLibelle($_REQUEST['libelle']);
        $_Parti -> setStatus($tools::$enabled);
        $_Parti -> setAction($_REQUEST_ACTION);
        $_Parti->setCreateBy($_REQUEST['createdBy']);
        //Insertion en base
        $_Response = $_ModelParti ->CrudParti($_Parti);
        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else{
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$DeleteById)
{
    if(isset($_REQUEST['partiId'])){
        //Traitement de la connexion
        $_Parti = new Parti();
        $_Parti -> setAction($_REQUEST_ACTION);
        $_Parti -> setPartiId($_REQUEST['partiId']);
        $_Response = $_ModelParti ->CrudParti($_Parti);

        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$Filtre || $_REQUEST_ACTION == $_ACTION::$SelectById)
{
    if(isset($_REQUEST['valeur'])){
        //Traitement de la connexion
        $_Parti -> setAction($_REQUEST_ACTION);
        $_Parti -> setPartiId($_REQUEST['valeur']);
        $_Response = $_ModelParti ->CrudParti($_Parti);
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
    $_Parti -> setAction($_REQUEST_ACTION);
    $_Response = $_ModelParti ->CrudParti($_Parti);
    $_RESPONSE = $tools::getMessageError($_Response);
}

echo json_encode($_RESPONSE);

