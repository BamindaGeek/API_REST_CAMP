<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 20/05/2020
 * Time: 15:46
 */

class Action
{
    public static $Insert = 'Insert';
    public static $SelectAll = 'SelectAll';
    public static $SelectAllBy = 'SelectAllBy';
    public static $SelectById = 'SelectById';
    public static $UpdateById = 'UpdateById';
    public static $DeleteById = 'DeleteById';
    public static $Connect = 'Connect';
    public static $Filtre = 'Filtre';
    public static $Rechercher = 'Rechercher';

    /**
     * Action constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getInsert()
    {
        return $this::$Insert;
    }

    /**
     * @param mixed $Insert
     */
    public function setInsert($Insert)
    {
        $this::$Insert = $Insert;
    }

    /**
     * @return mixed
     */
    public function getSelectAll()
    {
        return $this::$SelectAll;
    }

    /**
     * @param mixed $SelectAll
     */
    public function setSelectAll($SelectAll)
    {
        $this::$SelectAll = $SelectAll;
    }

    /**
     * @return mixed
     */
    public function getSelectAllBy()
    {
        return $this::$SelectAllBy;
    }

    /**
     * @param mixed $SelectAllBy
     */
    public function setSelectAllBy($SelectAllBy)
    {
        $this::$SelectAllBy = $SelectAllBy;
    }

    /**
     * @return mixed
     */
    public function getSelectById()
    {
        return $this::$SelectById;
    }

    /**
     * @param mixed $SelectById
     */
    public function setSelectById($SelectById)
    {
        $this::$SelectById = $SelectById;
    }

    /**
     * @return mixed
     */
    public function getUpdateById()
    {
        return $this::$UpdateById;
    }

    /**
     * @param mixed $UpdateById
     */
    public function setUpdateById($UpdateById)
    {
        $this::$UpdateById = $UpdateById;
    }

    /**
     * @return mixed
     */
    public function getDeleteById()
    {
        return $this::$DeleteById;
    }

    /**
     * @param mixed $DeleteById
     */
    public function setDeleteById($DeleteById)
    {
        $this::$DeleteById = $DeleteById;
    }


}
