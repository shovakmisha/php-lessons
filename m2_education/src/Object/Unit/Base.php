<?php

namespace Object\Unit;

use Service\EventManager;

abstract class Base
{
    /**
     * @var int
     */
    protected $_health;

    protected $_id;

    /**
     * Returns unit damage amount
     *
     * @return int
     */
    abstract function calculateDamage();

    /**
     * Returns unit type
     *
     * @return string
     */
    abstract function getType();

    /**
     * Set health value
     *
     * @param int $health Health value
     *
     * @return $this
     */
    public function setHealth($health)
    {
        $this->_health = $health;
        return $this;
    }

    /**
     * Returns health value
     *
     * @return mixed
     */
    public function getHealth()
    {
        return $this->_health;
    }

    /**
     * Set id value
     *
     * @param int $id Model id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * Returns id value
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Attack on unit
     *
     * @param Base $unit Unit
     *
     * @return $this
     */
    public function attack(Base $unit)
    {
        $unitHp = $unit->getHealth();
        $unitHp = $unitHp - $this->calculateDamage();
        $unit->setHealth($unitHp);
        $this->_getEventManger()->throwEvent('unit_damaged', ['unit' => $unit]);
        return $this;
    }

    /**
     * Describe unit status
     *
     * @return void
     */
    public function describe()
    {
        echo '<br/>';
        echo sprintf('%s: <br/> Health: %s <br/>', $this->getType(), $this->getHealth());
        if ($this->getType() == 'alien') {
            echo sprintf('Power: %s <br/>', $this->getPower());
        }
        if ($this->getType() == 'marine') {
            echo sprintf('Weapon type: %s <br/>', $this->getWeaponType());
        }
    }

    /**
     * Returns event manager
     *
     * @return EventManager
     */
    protected function _getEventManger()
    {
        return EventManager::getInstance();
    }
}