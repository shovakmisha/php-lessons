<?php

/**
 * Class Alanstormdotcom_Helloworld_IndexController
 */
class Alanstormdotcom_Weblog_IndexController extends Mage_Core_Controller_Front_Action {

    // public function testModelAction() {
    //     echo 'Setup!';
    // }

    public function testModelAction() {

        //echo '7777';

       // $blogpost = Mage::getModel('weblog/blogpost');
       // echo get_class($blogpost);

        $params = $this->getRequest()->getParams();
        $blogpost = Mage::getModel('weblog/blogpost');
        echo("Loading the blogpost with an ID of ".$params['id']);



        $blogpost->load($params['id']);


        $data = $blogpost->getData();
        var_dump($data);


        
    }

}