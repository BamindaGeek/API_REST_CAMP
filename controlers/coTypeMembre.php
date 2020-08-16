<?php

require '../tools/tools.php';
require '../class/Action.php';
require '../class/TypeMembre.php';
require '../models/moTypeMembre.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelTypeMembre = new moTypeMembre(); // Instance de la class Model couche d'acces à la BD
$_TypeMembre = new TypeMembre();

if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['libelle']) && !empty($_REQUEST['libelle']) &&
        isset($_REQUEST['code']) && !empty($_REQUEST['code']) &&
        isset($_REQUEST['createdBy']) && !empty($_REQUEST['createdBy'])
    ){
        //$_TypeMembre = new TypeMembre();
        $_TypeMembre -> setTypeMembreId(isset($_REQUEST['typeMembreId']) && !empty($_REQUEST['typeMembreId']) ? $_REQUEST['typeMembreId'] : $tools::generateGuid());
        $_TypeMembre -> setLibelle($_REQUEST['libelle']);
        $_TypeMembre -> setCode($_REQUEST['code']);
        $_TypeMembre -> setStatus($tools::$enabled);
        $_TypeMembre -> setAction($_REQUEST_ACTION);
        $_TypeMembre->setCreateBy($_REQUEST['createdBy']);
        //Insertion en base
        $_Response = $_ModelTypeMembre ->CrudTypeMembre($_TypeMembre);
        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else{
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$DeleteById)
{
    if(isset($_REQUEST['typeMembreId'])){
        //Traitement de la connexion
        $_TypeMembre = new TypeMembre();
        $_TypeMembre -> setAction($_REQUEST_ACTION);
        $_TypeMembre -> setTypeMembreId($_REQUEST['typeMembreId']);
        $_Response = $_ModelTypeMembre ->CrudTypeMembre($_TypeMembre);

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
        $_TypeMembre -> setAction($_REQUEST_ACTION);
        $_TypeMembre -> setTypeMembreId($_REQUEST['valeur']);
        $_Response = $_ModelTypeMembre ->CrudTypeMembre($_TypeMembre);
        $_RESPONSE = $tools::getMessageError($_Response != null && $_Response != 1 && sizeof($_Response) > 0 ? $_Response : array());
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

if($_REQUEST_ACTION != null &&  $_REQUEST_ACTION == $_ACTION::$SelectAll) {

    //Traitement de la connexion
    $_TypeMembre->setAction($_REQUEST_ACTION);
    $_Response = $_ModelTypeMembre->CrudTypeMembre($_TypeMembre);
    $_RESPONSE = $tools::getMessageError($_Response);
}

echo json_encode($_RESPONSE);

