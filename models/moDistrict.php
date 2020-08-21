<?php

include 'bdd.php';
class moDistrict extends bdd
{
    public function CrudDistrict(District  $district){
        $this->Query='CALL ps_District(:districtId,
                                        :libelle,
                                        :status,
                                        :createdBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'districtId'=>$district->getDistrictId(),
                    'libelle'=>$district->getLibelle(),
                    'status'=>$district->getStatus(),
                    'createdBy'=>$district->getCreatedBy(),
                    'Action'=>$district->getAction()
                )
            );

            switch ($district->getAction()){
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
