<?php

class IGN_Siteblocks_TestController extends Mage_Core_Controller_Front_Action {

    public function mytestAction()
    {


        $x = Mage::getConfig();


        var_dump( Mage::getStoreConfig('siteblocks/settings/enabled') );

        $uux = 'dd';

    }
}