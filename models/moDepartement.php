<?php

include 'bdd.php';

class moDepartement extends bdd
{
    public function CrudDepartement(Departement $departement)
    {
        $this->Query='CALL ps_Departement (:departementId,
                                        :libelle,
                                        :regionId,
                                        :status,
                                        :createdBy,
                                        :Action)';
        try
        {
            $this->beginTrans();

            $PDOprepare = $this ->prepareQuery();

            $PDOprepare->execute(array(
                    'departementId'=>$departement->getDepartementId(),
                    'libelle'=>$departement->getLibelle(),
                    'regionId'=>$departement->getRegionId(),
                    'status'=>$departement->getStatus(),
                    'createdBy'=>$departement->getCreatedBy(),
                    'Action'=>$departement->getAction()
                )
            );

            switch ($departement->getAction()){
                case $this::$Filtre:
                case $this::$SelectAll:
                case $this::$SelectById:
                    $this->Response = $PDOprepare -> fetchAll();
                    break;
               /* case $this::$SelectById:
                    $this->Response = $PDOprepare -> fetchAll();
                    break;*/
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
