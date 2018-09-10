<?php

namespace Service;

class Singleton
{
    /**
     * @var Singleton|null
     */
    static protected $_instance;

    /**
     * @var int
     */
    protected $_counter = 0;

    /**
     * Singleton constructor.
     *
     * Constructor private to avoid using 'new' operator outside of class
     */
    protected function __construct()
    {

    }

    /**
     * Returns or create and returns instance of current class
     *
     * @return self
     */
    static public function getInstance()
    {
        if (!static::$_instance) {
            static::$_instance = new static();
        }

        return static::$_instance;
    }

    /**
     * Set inner counter
     *
     * @param int $value Value
     *
     * @return void
     */
    public function setCounter($value)
    {
        $this->_counter = $value;
    }

    /**
     * Returns value of inner counter
     *
     * @return int
     */
    public function getCounter()
    {
        return $this->_counter;
    }
}