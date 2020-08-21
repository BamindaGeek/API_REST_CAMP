<?php

include 'bdd.php';
class moComiteBase extends bdd
{
    public function CrudComiteBase(ComiteBase $comiteBase)
    {
        $this->Query='CALL ps_ComiteBase (:comiteBaseId,
                                        :libelle,
                                        :code,
                                        :sectionId,
                                        :status,
                                        :createdBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'comiteBaseId'=>$comiteBase->getcomiteBaseId(),
                    'libelle'=>$comiteBase->getLibelle(),
                    'code'=>$comiteBase->getCode(),
                    'sectionId'=>$comiteBase->getSectionId(),
                    'status'=>$comiteBase->getStatus(),
                    'createdBy'=>$comiteBase->getCreateBy(),
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
                    //print_r($this->Response);
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
