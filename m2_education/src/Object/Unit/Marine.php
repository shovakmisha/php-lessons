<?php

namespace Object\Unit;

class Marine extends Base
{
    /**
     * @var string
     */
    protected $_weaponType;

    /**
     * Returns unit type
     *
     * @return string
     */
    public function getType()
    {
        return 'marine';
    }

    /**
     * Returns weapon type
     *
     * @return string
     */
    public function getWeaponType()
    {
        return $this->_weaponType;
    }

    /**
     * Returns power value
     *
     * @param string $type Weapon type
     *
     * @return $this
     */
    public function setWeaponType($type)
    {
        $this->_weaponType = $type;
        return $this;
    }

    /**
     * Calculate marine damage
     *
     * @return int
     */
    public function calculateDamage()
    {
        return strlen($this->getWeaponType()) * 2;
    }
}