<?php

/**
 * Class Alanstormdotcom_Weblog_Model_Blogpost
 */
class Alanstormdotcom_Weblog_Model_Blogpost extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('weblog/blogpost');
    }
}