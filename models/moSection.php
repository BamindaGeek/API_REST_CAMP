<?php

include 'bdd.php';
class moSection extends bdd
{
    public function CrudSection(Section $section)
    {
        $this->Query='CALL ps_Section (:sectionId,
                                        :libelle,
                                        :code,
                                        :comiteBaseId,
                                        :status,
                                        :createBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'sectionId'=>$section->getsectionId(),
                    'libelle'=>$section->getLibelle(),
                    'code'=>$section->getCode(),
                    'comiteBaseId'=>$section->getComiteBaseId(),
                    'status'=>$section->getStatus(),
                    'createBy'=>$section->getCreateBy(),
                    'Action'=>$section->getAction()
                )
            );

            switch ($section->getAction()){
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