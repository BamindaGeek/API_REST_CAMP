<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 20/05/2020
 * Time: 19:59
 */
require '../class/Action.php';
require '../tools.php';
require '../class/Access.php';
require '../models/MoAccess.php';

$_ACTION = new Action(); //Instance de la class Objet
$_ModelAccess = new MoAccess(); // Instance de la class Model couche d'acces à la BD
//Connexion d'un utilisateur
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$Connect)
{
    if(
        isset($_REQUEST['Pseudo']) && !empty($_REQUEST['Pseudo'])
        && isset($_REQUEST['Password']) && !empty($_REQUEST['Password'])
    )
    {

        //Traitement de la connexion
        $_Access = new Access();
        $_Access -> setPseudo($_REQUEST['Pseudo']);
        $_Access -> setPassword($_REQUEST['Password']);
        $_Access -> setStatus(1);
        $_Access -> setAction($_REQUEST_ACTION);
        $_resultat = $_ModelAccess ->CrudAccess($_Access,$_ACTION);

        if($_resultat != null && sizeof($_resultat) > 1)
        {
            //print_r($_resultat);
            $datetime = new DateTime('tomorrow');
            $_RESPONSE['status'] = false;
            $_resultat['birthDate']= $tools::dateformatFrancaishort($_resultat['birthDate']);
            $_resultat['Remember'] = isset($_REQUEST['Remember']) && $_REQUEST['Remember'] == true ? true : false ;
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
//Connexion d'un utilisateur
if($_REQUEST_ACTION != null && $_REQUEST_ACTION == $_ACTION::$Insert){
    if(
        isset($_REQUEST['Pseudo']) && !empty($_REQUEST['Pseudo'])  &&
        isset($_REQUEST['Password']) && !empty($_REQUEST['Password'])
    )
    {
        $_Access = new Access();
        $_Access -> setAccessID($_NEWID);
        $_Access -> setPseudo($_REQUEST['Pseudo']);
        $_Access -> setPassword($_REQUEST['Password']);
        $_Access -> setEmail(isset($_REQUEST['Email']) && !empty($_REQUEST['Email'])  ? $_REQUEST['Email'] : null);
        $_Access -> setContact(isset($_REQUEST['Contact']) && !empty($_REQUEST['Contact']) ? $_REQUEST['Contact'] : null);
        $_Access -> setPersonneId($tools::generateGuid());
        $_Access -> setAction($_REQUEST_ACTION);
        $_Access -> setStatut($tools::$desabled);
        $_Response = $_ModelAccess ->CreateAccessPersonne($_Access);

        $_RESPONSE = $tools::getMessageSuccess($_Response);
    }
    else
    {
        $_RESPONSE = $tools::getMessageEmpty();
    }
}
echo json_encode($_RESPONSE);