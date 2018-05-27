<?php

namespace Service\Factory;

class Alien extends Base
{
    /**
     * Create alien unit
     *
     * @return \Object\Unit\Alien
     */
    public function create()
    {
        $alien = new \Object\Unit\Alien();
        $alien->setHealth(65);
        $alien->setPower(rand(1, 10));
        return $alien;
    }
}