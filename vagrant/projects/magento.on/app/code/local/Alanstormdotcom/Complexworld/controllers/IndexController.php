<?php

/**
 * Class Alanstormdotcom_Helloworld_IndexController
 */
class Alanstormdotcom_Complexworld_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {

        echo 'Hello Index!';

        //remove our previous echo
        //echo 'Hello Index!';

        // echo Mage::helper('catalog')->__('Text here');

        // $this->loadLayout();
        // $xxx = Mage::getConfig();
        // $this->renderLayout();

    }


}