<?php

class Mcd_Meeting02_Helper_Payment_Data extends Mage_Payment_Helper_Data
{
    public function getStoreMethods($store = null, $quote = null)
    {
        $methods = parent::getStoreMethods($store, $quote);

        // Comment

        return $methods;
    }
}