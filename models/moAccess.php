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
                                            :membreId,
                                            :status,
                                            :Action)';

            try
            {
                $this->beginTrans();

                $PDOprepare = $this ->prepareQuery();

                $PDOprepare->execute(array(
                        'accessId'=>$Access->getAccessId(),
                        'pseudo'=>$Access->getPseudo(),
                        'password'=>$Access->getPassword(),
                        'expiredOn'=>$Access->getExpired(),
                        'membreId'=>$Access->getMembreId(),
                        'status'=>$Access->getStatus(),
                        'Action'=>$Access->getAction()
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
