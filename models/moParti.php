<?php

include 'bdd.php';
class moParti extends bdd
{
    public function CrudParti(Parti $parti)
    {
        $this->Query='CALL ps_Parti (:partiId,
                                        :libelle,
                                        :status,
                                        :createBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'partiId'=>$parti->getPartiId(),
                    'libelle'=>$parti->getLibelle(),
                    'status'=>$parti->getStatus(),
                    'createBy'=>$parti->getCreateBy(),
                    'Action'=>$parti->getAction()
                )
            );

            switch ($parti->getAction()){
                case $this::$Filtre:
                case $this::$SelectAll:
                    $this->Response = $PDOprepare -> fetchAll();
                    break;
                case $this::$SelectById:
                    $this->Response = $PDOprepare -> fetch();
                    break;
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