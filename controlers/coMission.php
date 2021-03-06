<?php

require '../tools/tools.php';
require '../class/Action.php';
require '../class/Mission.php';
require '../models/moMission.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelMission = new moMission(); // Instance de la class Model couche d'acces à la BD
$_Mission = new Mission();

if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['libelle']) && !empty($_REQUEST['libelle']) &&
        isset($_REQUEST['checkList'])  &&
        isset($_REQUEST['createdBy']) && !empty($_REQUEST['createdBy'])
    ){

        //$_Mission = new Mission();
        $_Mission -> setMissionId(isset($_REQUEST['missionId']) && !empty($_REQUEST['missionId']) ? $_REQUEST['missionId'] : $tools::generateGuid());
        $_Mission -> setLibelle($_REQUEST['libelle']);
        $_Mission -> setCheckList($_REQUEST['checkList']);
        $_Mission -> setStatus($tools::$enabled);
        $_Mission -> setAction($_REQUEST_ACTION);
        $_Mission->setCreateBy($_REQUEST['createdBy']);
        //Insertion en base
        $_Response = $_ModelMission ->CrudMission($_Mission);
        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else{
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$DeleteById)
{
    if(isset($_REQUEST['missionId'])){
        //Traitement de la connexion
        $_Mission = new Mission();
        $_Mission -> setAction($_REQUEST_ACTION);
        $_Mission -> setMissionId($_REQUEST['missionId']);
        $_Response = $_ModelMission ->CrudMission($_Mission);

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
        $_Mission -> setAction($_REQUEST_ACTION);
        $_Mission -> setMissionId($_REQUEST['valeur']);
        $_Response = $_ModelMission ->CrudMission($_Mission);
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
    $_Mission -> setAction($_REQUEST_ACTION);
    $_Response = $_ModelMission ->CrudMission($_Mission);
    $_RESPONSE = $tools::getMessageError($_Response);
}

echo json_encode($_RESPONSE);

