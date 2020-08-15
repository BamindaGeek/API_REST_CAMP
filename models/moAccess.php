<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 21/08/2019
 * Time: 12:34
 */

    include 'bdd.php';

    class moAccess extends bdd
    {

        // Fonction pour ajouter un nouvell accèss
        public function CrudAccess (Access $Access)
        {
            $this->Query='CALL ps_Access (  :accessId,
                                            :pseudo,
                                            :password,
                                            :expiredOn,
                                            :Action,
                                            :membreId,
                                            :status)';

            try
            {
                $this->beginTrans();

                $PDOprepare = $this ->prepareQuery();

                $PDOprepare->execute(array(
                        'accessId'=>$Access->getAccessId(),
                        'pseudo'=>$Access->getPseudo(),
                        'password'=>$Access->getPassword(),
                        'expiredOn'=>$Access->getExpired(),
                        'Action'=>$Access->getAction(),
                        'membreId'=>$Access->getMembreId(),
                        'status'=>$Access->getStatus()
                    )
                );

                switch ($Access->getAction()){
                    case $this::$SelectAll :
                        $this->Response = $PDOprepare -> fetchAll();
                        break;
                    case $this::$Connect:
                    case $this::$SelectById :
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

    }