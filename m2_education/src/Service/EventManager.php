<?php

namespace Service;

class EventManager extends Singleton
{
    /**
     * @var array
     */
    protected $_observers = [];

    /**
     * Throws system event
     *
     * @param string $name Event name
     * @param array  $data Event data
     *
     * @return void
     */
    public function throwEvent($name, $data)
    {
        if ($observers = $this->_getObserversByName($name)) {
            foreach ($observers as $observer) {
                $observer->observe($data);
            }
        }
    }

    /**
     * Add observer to common array
     *
     * @param string        $eventName Event name
     * @param Observer\Base $observer  Observer object
     *
     * @return $this
     */
    public function addObserver($eventName, Observer\Base $observer)
    {
        $this->_observers[$eventName][] = $observer;
        return $this;
    }

    /**
     * Returns array of related observers
     *
     * @param string $eventName Event name
     *
     * @return array|null
     */
    protected function _getObserversByName($eventName)
    {
        if (isset($this->_observers[$eventName])) {
            return $this->_observers[$eventName];
        }

        return null;
    }
}