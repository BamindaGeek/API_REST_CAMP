<?php
require '../tools/tools.php';
require '../class/Action.php';
require '../class/AffectationMission.php';
require '../models/moAffectationMission.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelAffectationMission = new moAffectationMission(); // Instance de la class Model couche d'acces à la BD
$_AffectationMission = new AffectationMission();

if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['missionId']) && !empty($_REQUEST['missionId'])  &&
        isset($_REQUEST['membreId']) && !empty($_REQUEST['membreId'])
    ){
        //$_AffectationMission = new AffectationMission();
        $_AffectationMission -> setAffectationMissionId(isset($_REQUEST['affectationMissionId']) && !empty($_REQUEST['affectationMissionId']) ? $_REQUEST['affectationMissionId'] : $tools::generateGuid());
        $_AffectationMission -> setMissionId($_REQUEST['missionId']);
        $_AffectationMission -> setMembreId($_REQUEST['membreId']);
        $_AffectationMission -> setStatus($tools::$enabled);
        $_AffectationMission -> setAction($_REQUEST_ACTION);
        $_AffectationMission -> setCreateBy($_REQUEST['createdBy']);
        //Insertion en base
        $_Response = $_ModelAffectationMission ->CrudAffectationMission($_AffectationMission);
        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else{
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$DeleteById)
{
    if(isset($_REQUEST['affectationMissionId'])){
        //Traitement de la connexion
        $_AffectationMission = new AffectationMission();
        $_AffectationMission -> setAction($_REQUEST_ACTION);
        $_AffectationMission -> setAffectationMissionId($_REQUEST['affectationMissionId']);
        $_Response = $_ModelAffectationMission ->CrudAffectationMission($_AffectationMission);

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
        $_AffectationMission -> setAction($_REQUEST_ACTION);
        $_AffectationMission -> setAffectationMissionId($_REQUEST['valeur']);
        $_Response = $_ModelAffectationMission ->CrudAffectationMission($_AffectationMission);
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
    $_AffectationMission -> setAction($_REQUEST_ACTION);
    $_Response = $_ModelAffectationMission ->CrudAffectationMission($_AffectationMission);
    $_RESPONSE = $tools::getMessageError($_Response);
}

echo json_encode($_RESPONSE);
