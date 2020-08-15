<?php

require '../tools/tools.php';
require '../class/Action.php';
require '../class/Affectation.php';
require '../models/moAffectation.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelAffectation = new moAffectation(); // Instance de la class Model couche d'acces à la BD
$_Affectation = new Affectation();

if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['acteurId']) && !empty($_REQUEST['acteurId'])  &&
        isset($_REQUEST['blocId']) && !empty($_REQUEST['blocId']) &&
        isset($_REQUEST['type']) && !empty($_REQUEST['type'])
    ){
        //$_Affectation = new Affectation();
        $_Affectation -> setAffectationId(isset($_REQUEST['affectationId']) && !empty($_REQUEST['affectationId']) ? $_REQUEST['affectationId'] : $tools::generateGuid());
        $_Affectation -> setActeurId($_REQUEST['acteurId']);
        $_Affectation -> setBlocId($_REQUEST['blocId']);
        $_Affectation -> setType($_REQUEST['type']);
        $_Affectation -> setStatus($tools::$enabled);
        $_Affectation -> setAction($_REQUEST_ACTION);
        //Insertion en base
        $_Response = $_ModelAffectation ->CrudAffectation($_Affectation);
        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else{
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$DeleteById)
{
    if(isset($_REQUEST['affectationId'])){
        //Traitement de la connexion
        $_Affectation = new Affectation();
        $_Affectation -> setAction($_REQUEST_ACTION);
        $_Affectation -> setAffectationId($_REQUEST['affectationId']);
        $_Response = $_ModelAffectation ->CrudAffectation($_Affectation);

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
        $_Affectation -> setAction($_REQUEST_ACTION);
        $_Affectation -> setAffectationId($_REQUEST['valeur']);
        $_Response = $_ModelAffectation ->CrudAffectation($_Affectation);
        $_RESPONSE = $tools::getMessageError($_Response);
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

echo json_encode($_RESPONSE);
