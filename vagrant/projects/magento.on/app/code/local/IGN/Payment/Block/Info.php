<?php

/**
 * Base payment iformation block
 *
 */
class IGN_Payment_Block_Info extends Mage_Payment_Block_Info
{

    public function _construct(array $args = array())
    {
        parent::_construct($args);

        $this->setTemplate('ignpayment/info.phtml'); // http://joxi.ru/LmG9DozuwRYVMA
    }


}
