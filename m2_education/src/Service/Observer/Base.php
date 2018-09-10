<?php

namespace Service\Observer;

abstract class Base
{
    /**
     * Observe method
     *
     * @param array $data Event data array
     *
     * @return void
     */
    abstract public function observe(array $data);
}