<?php



    class Logger{
        private $name = "./control.log";
        static private $_instance;
        private function __construct()
        {
        }
        private function __clone()
        {
            // TODO: Implement __clone() method.
        }

        static function getInstance(){
            if(!self::$_instance){
                self::$_instance = new self;
            }
            return self::$_instance;

        }

        function log($msg){
            file_put_contents($this->name, $msg, FILE_APPEND);
        }
        function setPath($path){
            $this->name = $path;
        }
    }

    $log = Logger::getInstance();
    $log->log("Контрольная точка на строке ".__LINE__);

    $newLog = Logger::getInstance();
    $newLog->setPath('newControl.log');
    $newLog->log("Контрольная точка на строке ".__LINE__);

    echo 'singleton';

?>

