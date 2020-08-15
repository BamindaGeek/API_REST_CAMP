<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 21/08/2019
 * Time: 12:34
 */

    include 'bdd.php';

    class MoAccess extends bdd
    {

        // Fonction pour ajouter un nouvell accèss
        public function CrudAccess (Access $Access,Action $_ACTION)
        {
            $this->Query='CALL ps_Access (  :AccessID,
                                            :Pseudo,
                                            :Password,
                                            :MembreId,
                                            :ExpiredOn,
                                            :Action,
                                            :Status)';

            try
            {
                $this->beginTrans();

                $PDOprepare = $this ->prepareQuery();

                $PDOprepare->execute(array(
                        'AccessID'=>$Access->getAccessID(),
                        'Pseudo'=>$Access->getPseudo(),
                        'Password'=>$Access->getPassword(),
                        'MembreId'=>$Access->getPersonneId(),
                        'ExpiredOn'=>$Access->getExpired(),
                        'Statut'=>$Access->getStatus(),
                        'Action'=>$Access->getAction()
                    )
                );

                switch ($Access->getAction()){
                    case $_ACTION::$SelectAll :
                        $this->Response = $PDOprepare -> fetchAll();
                        break;
                    case $_ACTION::$SelectById :
                        $this->Response = $PDOprepare -> fetch();
                        break;
                    case $_ACTION::$Connect :
                        $this->Response = $PDOprepare -> fetch();
                        break;
                    default:
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
        // Fonction pour ajouter un nouvel utilisateur et sons accèss
        public function CreateAccessPersonne (Access $Access)
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
                $PDOprepare = $this ->prepareQuery();
                $PDOprepare->execute(array(
                        'PersonneId'=>$Access->getPersonneId(),
                        'FistName'=>$Access->getFistName(),
                        'LastName'=>$Access->getLastName(),
                        'Email'=>$Access->getEmail(),
                        'Contact'=>$Access->getContact(),
                        'CodePostal'=>$Access->getCodePostal(),
                        'Sexe'=>$Access->getSexe(),
                        'jobTitle'=>$Access->getJobTitle(),
                        'DateNaissance'=>$Access->getDateNaissance(),
                        'statut'=>$Access->getStatut(),
                        'Action'=>$Access->getAction()
                    )
                );
                $PDOprepare -> closecursor();

                $this->Query='CALL ps_Access (  :AccessID,
                                            :Pseudo,
                                            :Password,
                                            :PersonneId,
                                            :ExpiredOn,
                                            :Action,
                                            :Statut)';

                $PDOprepare = $this ->prepareQuery();

                $PDOprepare->execute(array(
                        'AccessID'=>$Access->getAccessID(),
                        'Pseudo'=>$Access->getPseudo(),
                        'Password'=>$Access->getPassword(),
                        'PersonneId'=>$Access->getPersonneId(),
                        'ExpiredOn'=>$Access->getExpired(),
                        'Statut'=>$Access->getStatut(),
                        'Action'=>$Access->getAction()
                    )
                );

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