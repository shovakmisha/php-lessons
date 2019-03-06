<?php

namespace Service;

class Connector extends Singleton
{
    /**
     * @var \PDO
     */
    protected $_connection;

    /**
     * Connector constructor.
     */
    protected function __construct()
    {
        try {
            $this->_connection = new \PDO(
                'mysql:host=localhost;dbname=tapp',
                'root',
                'root',
                array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        } catch (\PDOException $e) {
            echo $e->getMessage();
            die;
        }
    }

    /**
     * Returns connection object
     *
     * @return \PDO
     */
    public function getConnection()
    {
        return $this->_connection;
    }
}