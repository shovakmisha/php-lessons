<?php

/**
 * Class Alanstormdotcom_Helloworld_IndexController
 */
class Alanstormdotcom_Helloworld_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {

        // header('Content-Type: text/plain');
        // echo $config = Mage::getConfig()
        //     ->loadModulesConfiguration('system.xml')
        //     ->getNode()
        //     ->asNiceXml();
        // exit;

         // echo 'Hello Index!';

        //remove our previous echo
        //echo 'Hello Index!';

        // echo Mage::helper('catalog')->__('Text here');

         // $this->loadLayout();
         // $xxx = Mage::getConfig();
         // $this->renderLayout();

        var_dump( Mage::getStoreConfig('helloworld_options/messages') );

        // var_dump(Mage::getStoreConfig('helloworld_options',1));

    }

    public function goodbyeAction() {
        // echo 'Goodbye World!';

        $this->loadLayout();
        $this->renderLayout();
    }

    public function paramsAction() {
        echo '<dl>';
        foreach($this->getRequest()->getParams() as $key=>$value) {
            echo '<dt><strong>Param: </strong>'.$key.'</dt>';
            echo '<dl><strong>Value: </strong>'.$value.'</dl>';
        }
        echo '</dl>';
    }

}