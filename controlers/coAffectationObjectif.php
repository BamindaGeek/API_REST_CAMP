<?php
require '../tools/tools.php';
require '../class/Action.php';
require '../class/AffectationObjectif.php';
require '../models/moAffectationObjectif.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelAffectationObjectif = new moAffectationObjectif(); // Instance de la class Model couche d'acces à la BD
$_AffectationObjectif = new AffectationObjectif();

if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['objectifId']) && !empty($_REQUEST['objectifId'])  &&
        isset($_REQUEST['departementId']) && !empty($_REQUEST['departementId']) &&
        isset($_REQUEST['valeur']) &&
        isset($_REQUEST['deadline']) && !empty($_REQUEST['deadline'])
    ){
        //$_AffectationObjectif = new AffectationObjectif();
        $_AffectationObjectif -> setAffectationObjectifId(isset($_REQUEST['affectationObjectifId']) && !empty($_REQUEST['affectationObjectifId']) ? $_REQUEST['affectationObjectifId'] : $tools::generateGuid());
        $_AffectationObjectif -> setObjectifId($_REQUEST['objectifId']);
        $_AffectationObjectif -> setDepartementId($_REQUEST['departementId']);
        $_AffectationObjectif -> setValeur($_REQUEST['valeur']);
        $_AffectationObjectif -> setDeadline($_REQUEST['deadline']);
        $_AffectationObjectif -> setComment(isset($_REQUEST['comment']) && !empty($_REQUEST['comment']) ? $_REQUEST['comment']:null);
        $_AffectationObjectif -> setStatus($tools::$enabled);
        $_AffectationObjectif -> setAction($_REQUEST_ACTION);
        $_AffectationObjectif -> setCreateBy($_REQUEST['createdBy']);
        //Insertion en base
        $_Response = $_ModelAffectationObjectif ->CrudAffectationObjectif($_AffectationObjectif);
        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else{
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$DeleteById)
{
    if(isset($_REQUEST['affectationObjectifId'])){
        //Traitement de la connexion
        $_AffectationObjectif = new AffectationObjectif();
        $_AffectationObjectif -> setAction($_REQUEST_ACTION);
        $_AffectationObjectif -> setAffectationObjectifId($_REQUEST['affectationObjectifId']);
        $_Response = $_ModelAffectationObjectif ->CrudAffectationObjectif($_AffectationObjectif);

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
        $_AffectationObjectif -> setAction($_REQUEST_ACTION);
        $_AffectationObjectif -> setAffectationObjectifId($_REQUEST['valeur']);
        $_Response = $_ModelAffectationObjectif ->CrudAffectationObjectif($_AffectationObjectif);
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
    $_AffectationObjectif -> setAction($_REQUEST_ACTION);
    $_Response = $_ModelAffectationObjectif ->CrudAffectationObjectif($_AffectationObjectif);
    $_RESPONSE = $tools::getMessageError($_Response);
}

if($_REQUEST_ACTION != null &&  $_REQUEST_ACTION == $_ACTION::$SelectAllBy)
{
    if(isset($_REQUEST['valeur'])){
        //Traitement de la connexion
        $_AffectationObjectif -> setAction($_REQUEST_ACTION);
        $_AffectationObjectif -> setAffectationObjectifId($_REQUEST['valeur']);
        $_Response = $_ModelAffectationObjectif ->CrudAffectationObjectif($_AffectationObjectif);
        $_RESPONSE = $tools::getMessageError($_Response);
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

echo json_encode($_RESPONSE);
