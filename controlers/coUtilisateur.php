<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 20/05/2020
 * Time: 19:59
 */
require '../class/Action.php';
require '../tools/tools.php';
require '../class/Access.php';
require '../models/moAccess.php';

$_ACTION = new Action(); //Instance de la class Objet
$_ModelAccess = new moAccess(); // Instance de la class Model couche d'acces à la BD
//Connexion d'un utilisateur
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$Connect)
{
    if(
        isset($_REQUEST['pseudo']) && !empty($_REQUEST['pseudo'])
        && isset($_REQUEST['password']) && !empty($_REQUEST['password'])
    )
    {

        //Traitement de la connexion
        $_Access = new Access();
        $_Access -> setPseudo($_REQUEST['pseudo']);
        $_Access -> setPassword($_REQUEST['password']);
        $_Access -> setStatus(1);
        $_Access -> setAction($_REQUEST_ACTION);
        $_resultat = $_ModelAccess ->CrudAccess($_Access,$_ACTION);

        if($_resultat != null && sizeof($_resultat) > 1)
        {
            //print_r($_resultat);
            $datetime = new DateTime('tomorrow');
            $_RESPONSE['status'] = false;
           // $_resultat['birthDate']= $tools::dateformatFrancaishort($_resultat['birthDate']);
           // $_resultat['Remember'] = isset($_REQUEST['Remember']) && $_REQUEST['Remember'] == true ? true : false ;
            $_RESPONSE['ExpiredOn'] = $datetime;
            $_RESPONSE['donnees'] = $_resultat;
            $_RESPONSE['message'] = 'Identification réussit ';
            //print_r(sizeof($_RESPONSE));
        }
        else
        {
            $_RESPONSE['status'] = true;
            $_RESPONSE['donnees'] = null;
            $_RESPONSE['message'] = 'Echec de connexion. Utilisateur inconnu.';
        }
    }
    else{


        $_RESPONSE = $tools->getMessageEmpty();
    }
}
//Creation d'un utilisateur
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$Insert){
    if(
        isset($_REQUEST['pseudo']) && !empty($_REQUEST['pseudo'])  &&
        isset($_REQUEST['password']) && !empty($_REQUEST['password']) &&
        isset($_REQUEST['membreId']) && !empty($_REQUEST['membreId'])
    )
    {
        $_Access = new Access();
        $_Access -> setAccessID($_NEWID);
        $_Access -> setPseudo($_REQUEST['pseudo']);
        $_Access -> setPassword($_REQUEST['password']);
        $_Access -> setMembreId($_REQUEST['membreId']);
        $_Access -> setAction($_REQUEST_ACTION);
        $_Access -> setStatus($tools::$enabled);
        $_Response = $_ModelAccess ->CrudAccess($_Access);

        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
echo json_encode($_RESPONSE);
