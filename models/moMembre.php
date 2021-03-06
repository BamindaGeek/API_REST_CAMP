<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 24/05/2020
 * Time: 12:05
 */
include "bdd.php";
class moMembre extends bdd
{
    //Fonction générique permetant de faire des Creations, Reads, Updates, Deletes
    //selon l'action demandée par l'appelle
    public function CrudMembre (Membre $Membre)
    {
        $this->Query='CALL ps_Membre (:membreId,
                                        :numeroElecteur,
                                        :numeroCNI,
                                        :nom,
                                        :prenom,
                                        :email,
                                        :contact,
                                        :sex,
                                        :communeId,
                                        :comiteBaseId,
                                        :lieuVoteId,
                                        :dateNaissance,
                                        :lieuNaissance,
                                        :adressePhysique,
                                        :adressePostale,
                                        :profession,
                                        :nomPere,
                                        :prenomPere,
                                        :dateNaissancePere,
                                        :lieuNaissancePere,
                                        :nomMere,
                                        :prenomMere,
                                        :dateNaissanceMere,
                                        :lieuNaissanceMere,
                                        :status,
                                        :createdBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'membreId'=>$Membre->getMembreId(),
                    'numeroElecteur'=>$Membre->getNumeroElecteur(),
                    'numeroCNI'=>$Membre->getNumeroCNI(),
                    'nom'=>$Membre->getNom(),
                    'prenom'=>$Membre->getPrenom(),
                    'email'=>$Membre->getEmail(),
                    'contact'=>$Membre->getContact(),
                    'sex'=>$Membre->getSex(),
                    'communeId'=>$Membre->getCommuneId(),
                    'comiteBaseId'=>$Membre->getComiteBaseId(),
                    'lieuVoteId'=>$Membre->getLieuVoteId(),
                    'dateNaissance'=>$Membre->getDateNaissance(),
                    'lieuNaissance'=>$Membre->getLieuNaissance(),
                    'adressePhysique'=>$Membre->getAdressePhysique(),
                    'adressePostale'=>$Membre->getAdressePostale(),
                    'profession'=>$Membre->getProfession(),
                    'nomPere'=>$Membre->getNomPere(),
                    'prenomPere'=>$Membre->getPrenomPere(),
                    'dateNaissancePere'=>$Membre->getDateNaissancePere(),
                    'lieuNaissancePere'=>$Membre->getLieuNaissancePere(),
                    'nomMere'=>$Membre->getNomMere(),
                    'prenomMere'=>$Membre->getPrenomMere(),
                    'dateNaissanceMere'=>$Membre->getDateNaissanceMere(),
                    'lieuNaissanceMere'=>$Membre->getLieuNaissanceMere(),
                    'status'=>$Membre->getStatus(),
                    'createdBy'=>$Membre->getCreateBy(),
                    'Action'=>$Membre->getAction()
                )
            );

            switch ($Membre->getAction()){
                case $this::$Filtre:
                case $this::$SelectAll:
                case $this::$Retrouver:
                case $this::$SelectAllBy:
                    $this->Response = $PDOprepare -> fetchAll();
                    break;
                case $this::$SelectById:
                case $this::$Rechercher:
                    $this->Response = $PDOprepare -> fetch();
                    break;
                case $this::$DeleteById:
                case $this::$UpdateById:
                case $this::$Insert:
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
