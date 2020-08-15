<?php

include 'bdd.php';
class moComiteBase extends bdd
{
    public function CrudComiteBase(ComiteBase $comiteBase)
    {
        $this->Query='CALL ps_ComiteBase (:comiteBaseId,
                                        :libelle,
                                        :code,
                                        :status,
                                        :createBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'comiteBaseId'=>$comiteBase->getcomiteBaseId(),
                    'libelle'=>$comiteBase->getLibelle(),
                    'code'=>$comiteBase->getCode(),
                    'status'=>$comiteBase->getStatus(),
                    'createBy'=>$comiteBase->getCreateBy(),
                    'Action'=>$comiteBase->getAction()
                )
            );

            switch ($comiteBase->getAction()){
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