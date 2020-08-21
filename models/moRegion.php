<?php

include 'bdd.php';

class moRegion extends bdd
{
    public function CrudRegion(Region $region)
    {
        $this->Query = 'CALL ps_Region (:regionId,
                                        :libelle,
                                        :districtId,
                                        :status,
                                        :createdBy,
                                        :Action)';
        try {
            $this->beginTrans();

            $PDOprepare = $this->prepareQuery();

            $PDOprepare->execute(array(
                    'regionId' => $region->getRegionId(),
                    'libelle' => $region->getLibelle(),
                    'districtId' => $region->getDistrictId(),
                    'status' => $region->getStatus(),
                    'createdBy' => $region->getCreatedBy(),
                    'Action' => $region->getAction()
                )
            );

            switch ($region->getAction()) {
                case $this::$Filtre:
                case $this::$SelectAll:
                    $this->Response = $PDOprepare->fetchAll();
                    break;
                case $this::$SelectById:
                    $this->Response = $PDOprepare->fetch();
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

            $PDOprepare->closecursor();

            $this->commitTrans();

            return $this->Response;
        } catch (PDOException $e) {
            $this->rollbackTrans();

            $Msg = $this->errorMsg($e);

            return $this->ResponseError;
        }
    }
}
