<?php
require '../tools/tools.php';
require '../class/Action.php';
require '../class/AffectationMembre.php';
require '../models/moAffectationMembre.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelAffectationMembre = new moAffectationMembre(); // Instance de la class Model couche d'acces à la BD
$_AffectationMembre = new AffectationMembre();

if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['membreId']) && !empty($_REQUEST['membreId'])  &&
        isset($_REQUEST['comiteBaseId']) && !empty($_REQUEST['comiteBaseId'])
    ){
        //$_AffectationMembre = new AffectationMembre();
        $_AffectationMembre -> setAffectationMembreId(isset($_REQUEST['affectationMembreId']) && !empty($_REQUEST['affectationMembreId']) ? $_REQUEST['affectationMembreId'] : $tools::generateGuid());
        $_AffectationMembre -> setMembreId($_REQUEST['membreId']);
        $_AffectationMembre -> setComiteBaseId($_REQUEST['comiteBaseId']);
        $_AffectationMembre -> setStatus($tools::$enabled);
        $_AffectationMembre -> setAction($_REQUEST_ACTION);
        $_AffectationMembre -> setCreateBy($_REQUEST['createdBy']);
        //Insertion en base
        $_Response = $_ModelAffectationMembre ->CrudAffectationMembre($_AffectationMembre);
        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else{
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$DeleteById)
{
    if(isset($_REQUEST['affectationMembreId'])){
        //Traitement de la connexion
        $_AffectationMembre = new AffectationMembre();
        $_AffectationMembre -> setAction($_REQUEST_ACTION);
        $_AffectationMembre -> setAffectationMembreId($_REQUEST['affectationMembreId']);
        $_Response = $_ModelAffectationMembre ->CrudAffectationMembre($_AffectationMembre);

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
        $_AffectationMembre -> setAction($_REQUEST_ACTION);
        $_AffectationMembre -> setAffectationMembreId($_REQUEST['valeur']);
        $_Response = $_ModelAffectationMembre ->CrudAffectationMembre($_AffectationMembre);
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
    $_AffectationMembre -> setAction($_REQUEST_ACTION);
    $_Response = $_ModelAffectationMembre ->CrudAffectationMembre($_AffectationMembre);
    $_RESPONSE = $tools::getMessageError($_Response);
}

echo json_encode($_RESPONSE);
