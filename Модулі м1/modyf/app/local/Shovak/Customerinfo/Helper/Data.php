<?php
/**
 * Shovak Customer Info data helper
 *
 * @category Shovak
 * @package Shovak_Customerinfo
 * @author Mykhaylo Shovak
 * @copyright 2018 Shovak
 */

/**
 * Class Shovak_Customerinfo_Helper_Data
 */
class Shovak_Customerinfo_Helper_Data extends Mage_Core_Helper_Abstract
{

    /**
     * Returns customer welcome message
     *
     * @return string
     */
    public function getCustomerWelcomeMessage()
    {
        return $this->__('Welcome back from Helper');
    }
}