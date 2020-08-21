<?php

include 'bdd.php';
class moAffectationMembre extends bdd
{
    public function CrudAffectationMembre(AffectationMembre $affectationMembre){

            $this->Query='CALL ps_AffectationMembre(:affectationMembreId,
                                        :membreId,
                                        :comiteBaseId,
                                        :status,
                                        :createdBy,
                                        :Action)';
            try
            {
                $this->beginTrans();

                $PDOprepare = $this ->prepareQuery();

                $PDOprepare->execute(array(
                        'affectationMembreId'=>$affectationMembre->getAffectationMembreId(),
                        'membreId'=>$affectationMembre->getMembreId(),
                        'comiteBaseId'=>$affectationMembre->getComiteBaseId(),
                        'status'=>$affectationMembre->getStatus(),
                        'createdBy'=>$affectationMembre->getCreateBy(),
                        'Action'=>$affectationMembre->getAction()
                    )
                );

                switch ($affectationMembre->getAction()){
                    case $this::$Filtre:
                    case $this::$SelectAll:
                        $this->Response = $PDOprepare -> fetchAll();
                        break;
                    case $this::$SelectById:
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
