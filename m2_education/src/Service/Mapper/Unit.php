<?php

namespace Service\Mapper;

use Service\Connector;

abstract class Unit
{
    protected $_insertStatement;

    protected $_deleteStatement;

    abstract public function saveUnit(\Object\Unit\Base $unit);

    abstract public function deleteUnit(\Object\Unit\Base $unit);

    /**
     * Returns connection object
     *
     * @return \PDO
     */
    public function getConnection()
    {
        return Connector::getInstance()->getConnection();
    }
}