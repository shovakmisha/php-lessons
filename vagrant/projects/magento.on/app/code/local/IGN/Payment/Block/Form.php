<?php

/**
 * Payment method form base block
 */
class IGN_Payment_Block_Form extends Mage_Payment_Block_Form
{

    public function _construct(array $args = array())
    {
        parent::_construct($args);

        $this->setTemplate('ignpayment/form.phtml'); //  // http://joxi.ru/LmG9DozuwRY7MA
    }

}
