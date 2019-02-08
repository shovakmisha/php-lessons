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

    // https://alanstorm.com/magento_collections/
    public function collectionsAction() {

        $thing_1 = new Varien_Object();
        $thing_1->setName('Richard');
        $thing_1->setAge(24);

        $thing_2 = new Varien_Object();
        $thing_2->setName('Jane');
        $thing_2->setAge(12);

        $thing_3 = new Varien_Object();
        $thing_3->setName('Spot');
        $thing_3->setLastName('The Dog');
        $thing_3->setAge(7);

        // var_dump($thing_1->getName());

        $collection_of_things = new Varien_Data_Collection();
        $collection_of_things
            ->addItem($thing_1)
            ->addItem($thing_2)
            ->addItem($thing_3);

        // var_dump($collection_of_things->getFirstItem()->getData());

        // var_dump( $collection_of_things->toXml() );

        $collection_of_products = Mage::getModel('catalog/product')->getCollection();

         // var_dump($collection_of_products->getSelect() ); // це я вибрав дані з бази. var_dump виведе обєкт Varien_Db_Select
         // var_dump($collection_of_products->getData() ); // вивів ті дані що я вибрав



        var_dump( (string) $collection_of_products->getSelect() );



    }

}