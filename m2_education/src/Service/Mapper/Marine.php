<?php

namespace Service\Mapper;

use Object\Unit\Base;

class Marine extends Unit
{
    /**
     * Marine constructor.
     */
    public function __construct()
    {
        $this->_insertStatement = $this->getConnection()->prepare('INSERT INTO marine (`health`,`weapon_type`) VALUES (?, ?)');
        $this->_deleteStatement = $this->getConnection()->prepare('DELETE FROM marine WHERE id = ?');
    }

    /**
     * Save marine unit data
     *
     * @param Base $unit Marine unit object
     *
     * @return void
     */
    public function saveUnit(Base $unit)
    {
        /** @var $unit \Object\Unit\Marine */
        $this->_insertStatement->execute([$unit->getHealth(), $unit->getWeaponType()]);
        $id = $this->getConnection()->lastInsertId();
        $unit->setId($id);
    }

    /**
     * Delete marine unit data
     *
     * @param Base $unit Marine unit object
     *
     * @return void
     */
    public function deleteUnit(Base $unit)
    {
        $this->_deleteStatement->execute([$unit->getId()]);
    }
}