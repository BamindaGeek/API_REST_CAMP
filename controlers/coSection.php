<?php

require '../tools/tools.php';
require '../class/Action.php';
require '../class/Section.php';
require '../models/moSection.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelSection = new moSection(); // Instance de la class Model couche d'acces à la BD
$_Section = new Section();

if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['libelle']) && !empty($_REQUEST['libelle']) &&
        isset($_REQUEST['code']) && !empty($_REQUEST['code'])  &&
        isset($_REQUEST['comiteBaseId']) && !empty($_REQUEST['comiteBaseId'])
    ){
        //$_Section = new Section();
        $_Section -> setSectionId(isset($_REQUEST['sectionId']) && !empty($_REQUEST['sectionId']) ? $_REQUEST['sectionId'] : $tools::generateGuid());
        $_Section -> setLibelle($_REQUEST['libelle']);
        $_Section -> setCode($_REQUEST['code']);
        $_Section -> setComiteBaseId($_REQUEST['comiteBaseId']);
        $_Section -> setStatus($tools::$enabled);
        $_Section -> setAction($_REQUEST_ACTION);
        $_Section->setCreateBy($_REQUEST['createdBy']);
        //Insertion en base
        $_Response = $_ModelSection ->CrudSection($_Section);
        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else{
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$DeleteById)
{
    if(isset($_REQUEST['sectionId'])){
        //Traitement de la connexion
        $_Section = new Section();
        $_Section -> setAction($_REQUEST_ACTION);
        $_Section -> setSectionId($_REQUEST['sectionId']);
        $_Response = $_ModelSection ->CrudSection($_Section);

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
        $_Section -> setAction($_REQUEST_ACTION);
        $_Section -> setSectionId($_REQUEST['valeur']);
        $_Response = $_ModelSection ->CrudSection($_Section);
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
    $_Section -> setAction($_REQUEST_ACTION);
    $_Response = $_ModelSection ->CrudSection($_Section);
    $_RESPONSE = $tools::getMessageError($_Response);
}

echo json_encode($_RESPONSE);

