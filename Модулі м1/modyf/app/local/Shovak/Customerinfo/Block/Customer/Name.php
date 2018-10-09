<?php


class Shovak_Customerinfo_Block_Customer_Name extends Mage_Core_Block_Template
{
    /**
     * @return string
     */
    public function getCustomerName()
    {
        return strval(rand());
    }
}