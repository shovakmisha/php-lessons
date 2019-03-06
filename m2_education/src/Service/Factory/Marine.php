<?php

namespace Service\Factory;

class Marine extends Base
{
    protected $_weaponTypes = ['laser', 'plasma', 'fire'];

    /**
     * Create marine unit
     *
     * @return \Object\Unit\Marine
     */
    public function create()
    {
        $marine = new \Object\Unit\Marine();
        $marine->setHealth(50);
        $marine->setWeaponType($this->_weaponTypes[rand(0,2)]);
        return $marine;
    }
}