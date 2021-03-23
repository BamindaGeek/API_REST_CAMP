<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 21/08/2019
 * Time: 11:17
 */

class bdd extends Action

{
    //private $host ='192.168.1.100';
    //private $host ='127.0.0.1';
    private $host ='localhost';
    // private $host = 'dm830513-001.privatesql:35211';
    // private $userName= 'geeksquad';
    // private $userPass= 'GeekSquad225';
    //private $userName= 'syabe';
    //private $userPass= 'GeekSqu@d225';
    private $userName= 'root';
    private $userPass= '';
    private $dbName= 'campagne_bd';

        private $dns;
        protected $connexion;
        public $Query;
        public $Response = 190;
        public $ResponseError = 2;

        public function __construct()
        {
            $this->open();
        }

        private function open()
        {
            try {
                $this->dns = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
                $option = array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC
                );

                $this->connexion = new PDO($this->dns, $this->userName, $this->userPass, $option);

                $this->connexion->exec("Set names utf8");
            } catch (PDOException $e) {
                $Msg = 'Erreur PDO dans ' . $e->getFile() . ' Ligne ' . $e->getLine() . ' : ' . $e->getMessage();
                die($Msg);
            }
        }
                public function beginTrans()
            {
                return $this -> connexion -> beginTransaction();
            }

                public function commitTrans()
            {
                return $this -> connexion -> commit();
            }

                public function rollbackTrans()
            {
                return $this -> connexion -> rollBack();
            }

                public function prepareQuery()
            {
                return $this -> connexion -> prepare($this->Query);
            }
            public function errorMsg(PDOException $error){
                $Msg = 'ERREUR PDO dans ' . $error->getFile() . ' Ligne. ' . $error->getLine() . ' : ' . $error->getMessage();
                die($Msg);
                return $Msg;
            }
}
