<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 24/05/2020
 * Time: 12:05
 */
include "bdd.php";
class moPersonne extends bdd
{
    //Fonction générique permetant de faire des Creations, Reads, Updates, Deletes
    //selon l'action demandée par l'appelle
    public function CrudPersonnes (Personne $Personne, Action $Action)
    {
        $this->Query='CALL ps_Personnes (:PersonneId,
                                        :FistName,
                                        :LastName,
                                        :Email,
                                        :Contact,
                                        :CodePostal,
                                        :Sexe,
                                        :jobTitle,
                                        :DateNaissance,
                                        :statut,
                                        :Action)';
        try
        {
            $this->beginTrans();
//print_r($Personne);
            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'PersonneId'=>$Personne->getPersonneId(),
                    'FistName'=>$Personne->getFistName(),
                    'LastName'=>$Personne->getLastName(),
                    'Email'=>$Personne->getEmail(),
                    'Contact'=>$Personne->getPhone(),
                    'CodePostal'=>$Personne->getLocation(),
                    'Sexe'=>$Personne->getGender(),
                    'jobTitle'=>$Personne->getJobTitle(),
                    'DateNaissance'=>$Personne->getbirthDate(),
                    'statut'=>$Personne->getStatus(),
                    'Action'=>$Personne->getAction()
                )
            );

            switch ($Personne->getAction()){
                case $Action::$SelectAll:
                    $this->Response = $PDOprepare -> fetchAll();
                    break;
                case $Action::$Filtre:
                    $this->Response = $PDOprepare -> fetchAll();
                    break;
                case $Action::$SelectById:
                    $this->Response = $PDOprepare -> fetch();
                    break;
                case $Action::$Insert:
                    $this->Response = 1;
                    break;
                case $Action::$UpdateById:
                    $this->Response = 1;
                    break;
                default:
                    $this->Response = 2;
                    break;
            }

            $PDOprepare -> closecursor();

            $this -> commitTrans();

            return $this->Response;
        }
        catch (PDOException $e)
        {
            $this -> rollbackTrans();

            $Msg = $this->errorMsg($e);

            return $this->ResponseError;
        }
    }
}