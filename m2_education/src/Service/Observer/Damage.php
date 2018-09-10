<?php

namespace Service\Observer;

use Object\Unit\Base;

class Damage extends \Service\Observer\Base
{
    /**
     * Observe method
     *
     * @param array $data Event data array
     *
     * @return void
     */
    public function observe(array $data){
        /** @var $unit Base*/
        $unit = $data['unit'];
        echo sprintf('<br/> Unit "%s" has been damaged. Left %s hp <br/>', $unit->getType(), $unit->getHealth());
    }
}