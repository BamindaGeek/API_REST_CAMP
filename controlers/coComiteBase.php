<?php

require '../tools/tools.php';
require '../class/Action.php';
require '../class/ComiteBase.php';
require '../models/moComiteBase.php';
$_ACTION = new Action(); //Instance de la class Action pour le CRUD
$_ModelComiteBase = new moComiteBase(); // Instance de la class Model couche d'acces à la BD
$_ComiteBase = new ComiteBase();

if($_REQUEST_ACTION != null && ($_REQUEST_ACTION == $_ACTION::$Insert || $_REQUEST_ACTION == $_ACTION::$UpdateById))
{
    if(
        isset($_REQUEST['libelle']) && !empty($_REQUEST['libelle']) &&
        isset($_REQUEST['code']) && !empty($_REQUEST['code']) &&
        isset($_REQUEST['partiId']) && !empty($_REQUEST['partiId']) &&
        isset($_REQUEST['createdBy']) && !empty($_REQUEST['createdBy'])
    ){
        //$_ComiteBase = new ComiteBase();
        $_ComiteBase -> setComiteBaseId(isset($_REQUEST['comiteBaseId']) && !empty($_REQUEST['comiteBaseId']) ? $_REQUEST['comiteBaseId'] : $tools::generateGuid());
        $_ComiteBase -> setLibelle($_REQUEST['libelle']);
        $_ComiteBase -> setCode($_REQUEST['code']);
        $_ComiteBase -> setPartiId($_REQUEST['partiId']);
        $_ComiteBase -> setStatus($tools::$enabled);
        $_ComiteBase -> setAction($_REQUEST_ACTION);
        $_ComiteBase->setCreateBy($_REQUEST['createdBy']);
        //Insertion en base
        $_Response = $_ModelComiteBase ->CrudComiteBase($_ComiteBase);
        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else{
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$DeleteById)
{
    if(isset($_REQUEST['comiteBaseId'])){
        //Traitement de la connexion
        $_ComiteBase = new ComiteBase();
        $_ComiteBase -> setAction($_REQUEST_ACTION);
        $_ComiteBase -> setComiteBaseId($_REQUEST['comiteBaseId']);
        $_Response = $_ModelComiteBase ->CrudComiteBase($_ComiteBase);

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
        $_ComiteBase -> setAction($_REQUEST_ACTION);
        $_ComiteBase -> setComiteBaseId($_REQUEST['valeur']);
        $_Response = $_ModelComiteBase ->CrudComiteBase($_ComiteBase);
        $_RESPONSE = $tools::getMessageError($_Response != null && $_Response != 1 && sizeof($_Response) > 0 ? $_Response : array());
        //print_r($_RESPONSE);
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}

if($_REQUEST_ACTION != null &&  $_REQUEST_ACTION == $_ACTION::$SelectAll)
{
        //Traitement de la connexion
        $_ComiteBase -> setAction($_REQUEST_ACTION);
        $_Response = $_ModelComiteBase ->CrudComiteBase($_ComiteBase);
        $_RESPONSE = $tools::getMessageError($_Response);
}
/*else {
        $_RESPONSE = $tools::getMessageEmpty();
}*/


echo json_encode($_RESPONSE);

