<?php

include 'bdd.php';
class moSection extends bdd
{
    public function CrudSection(Section $section)
    {
        $this->Query='CALL ps_Section (:sectionId,
                                        :libelle,
                                        :code,
                                        :communeId,
                                        :status,
                                        :createdBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'sectionId'=>$section->getsectionId(),
                    'libelle'=>$section->getLibelle(),
                    'code'=>$section->getCode(),
                    'communeId'=>$section->getCommuneId(),
                    'status'=>$section->getStatus(),
                    'createdBy'=>$section->getCreateBy(),
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
