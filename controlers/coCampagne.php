<?php

require '../tools/tools.php';
require '../class/Action.php';
require '../class/Campagne.php';
require '../models/moCampagne.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelCampagne = new moCampagne(); // Instance de la class Model couche d'acces à la BD
$_Campagne = new Campagne();

if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['libelle']) && !empty($_REQUEST['libelle'])
    ){
        //$_Campagne = new Campagne();
        $_Campagne -> setCampagneId(isset($_REQUEST['campagneId']) && !empty($_REQUEST['campagneId']) ? $_REQUEST['campagneId'] : $tools::generateGuid());
        $_Campagne -> setLibelle($_REQUEST['libelle']);
        $_Campagne -> setStatus($tools::$enabled);
        $_Campagne -> setAction($_REQUEST_ACTION);
        //Insertion en base
        $_Response = $_ModelCampagne ->CrudCampagne($_Campagne);
        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else{
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$DeleteById)
{
    if(isset($_REQUEST['campagneId'])){
        //Traitement de la connexion
        $_Campagne = new Campagne();
        $_Campagne -> setAction($_REQUEST_ACTION);
        $_Campagne -> setCampagneId($_REQUEST['campagneId']);
        $_Response = $_ModelCampagne ->CrudCampagne($_Campagne);

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
        $_Campagne -> setAction($_REQUEST_ACTION);
        $_Campagne -> setCampagneId($_REQUEST['valeur']);
        $_Response = $_ModelCampagne ->CrudCampagne($_Campagne);
        $_RESPONSE = $tools::getMessageError($_Response);
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

echo json_encode($_RESPONSE);

