<?php
require '../tools/tools.php';
require '../class/Action.php';
require '../class/Checklist.php';
require '../models/moChecklist.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelChecklist = new moChecklist(); // Instance de la class Model couche d'acces à la BD
$_Checklist = new Checklist();

if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['affectationMissionId']) && !empty($_REQUEST['affectationMissionId'])  &&
        isset($_REQUEST['membreId']) && !empty($_REQUEST['membreId'])&&
        isset($_REQUEST['etat']) && !empty($_REQUEST['etat'])
    ){
        //$_Checklist = new Checklist();
        $_Checklist -> setCheckListId(isset($_REQUEST['checkListId']) && !empty($_REQUEST['checkListId']) ? $_REQUEST['checkListId'] : $tools::generateGuid());
        $_Checklist -> setAffectationMissionId($_REQUEST['affectationMissionId']);
        $_Checklist -> setMembreId($_REQUEST['membreId']);
        $_Checklist -> setEtat($_REQUEST['etat']);
        $_Checklist -> setStatus($tools::$enabled);
        $_Checklist -> setAction($_REQUEST_ACTION);
        //Insertion en base
        $_Response = $_ModelChecklist ->CrudChecklist($_Checklist);
        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else{
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$DeleteById)
{
    if(isset($_REQUEST['checkListId'])){
        //Traitement de la connexion
        $_Checklist = new Checklist();
        $_Checklist -> setAction($_REQUEST_ACTION);
        $_Checklist -> setChecklistId($_REQUEST['checkListId']);
        $_Response = $_ModelChecklist ->CrudChecklist($_Checklist);

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
        $_Checklist -> setAction($_REQUEST_ACTION);
        $_Checklist -> setChecklistId($_REQUEST['valeur']);
        $_Response = $_ModelChecklist ->CrudChecklist($_Checklist);
        $_RESPONSE = $tools::getMessageError($_Response);
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

echo json_encode($_RESPONSE);
