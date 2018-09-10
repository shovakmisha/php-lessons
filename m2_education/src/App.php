<?php

class App
{
    /**
     * Run application
     *
     * @return void
     */
    public function run()
    {
        $this->_requireClasses();
        $this->_registerAutoloader();
        //$this->showSingleton();
        //$this->showFactory();
        //$this->showObserver();
        $this->showDMAndAR();
    }

    /**
     * Show singleton demo
     *
     * @return void
     */
    public function showSingleton()
    {
        $instanceOne = \Service\Singleton::getInstance();
        $instanceOne->setCounter(5);

        $instanceTwo = \Service\Singleton::getInstance();
        echo $instanceTwo->getCounter();

    }

    /**
     * Show factories demo
     *
     * @return void
     */
    public function showFactory()
    {
        $alienFactory  = new \Service\Factory\Alien();
        $marineFactory = new \Service\Factory\Marine();

        for($i = 0; $i < 3; $i++)
        {
            $alien  = $alienFactory->create();
            $marine = $marineFactory->create();

            $alien->describe();
            $marine->describe();
        }
    }

    /**
     * Show observer demo
     *
     * @return void
     */
    public function showObserver()
    {
        $eventManager  = \Service\EventManager::getInstance();
        $observer      = new \Service\Observer\Damage();

        $eventManager->addObserver('unit_damaged', $observer);

        $alienFactory  = new \Service\Factory\Alien();
        $marineFactory = new \Service\Factory\Marine();

        $alien  = $alienFactory->create();
        $marine = $marineFactory->create();

        $alien->describe();
        $marine->describe();

        $alien->attack($marine);
        $marine->attack($alien);
    }

    /**
     * Show data mapper demo
     *
     * @return void
     */
    public function showDMAndAR()
    {
        $marineFactory = new \Service\Factory\Marine();
        $alienFactory  = new \Service\Factory\Alien();
        $marine        = $marineFactory->create();
        $alien         = $alienFactory->create();

        $mapper        = new \Service\Mapper\Marine();
        /* $mapper->saveUnit($marine);
        echo sprintf('Created row with id: %s', $marine->getId());*/
        $marine->setId(16);
        $mapper->deleteUnit($marine);
        echo sprintf('Deleted row with id: %s', $marine->getId());

/*        $alien->save();
        echo sprintf('Created row with id: %s', $alien->getId());*/
/*        $alien->setId(2);
        $alien->delete();
        echo sprintf('Deleted row with id: %s', $alien->getId());*/

    }

    /**
     * Require classes witch cant be autoloaded
     *
     * @return void
     */
    protected function _requireClasses()
    {
        require_once 'Autoloader.php';
    }

    /**
     * Register system autoloader
     *
*
     * @return void
     */
    protected function _registerAutoloader(){
        spl_autoload_register('Autoloader::autoload');
    }
} 
