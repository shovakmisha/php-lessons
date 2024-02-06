<?php

    abstract class Db{
        abstract function connect($x);
        abstract function close();
    }

    class MyClass extends Db{
        function connect($x)
        {
            // TODO: Implement connect() method.

            echo 'function connect';

        }
        function close()
        {
            // TODO: Implement close() method.
            echo 'close function';
        }
    }

    $MyClass = new MyClass();

    class Azure{

        function set(Db $obj){
            $obj->connect(555);
            $obj->close();

        }

    }

    $Azure = new Azure();

    // interface

    interface MyInterface{
    //    function red();
    }

    class InterfaceClass{

        public  $obj;
        //function __construct(){
        //    $this->$obj = $obj;
        //    function red(){
        //        echo 'red';
        //    }
        //}

    }

    $InterfaceObj = new InterfaceClass();

    //echo $InterfaceObj->obj;

    if( $InterfaceObj instanceof InterfaceClass){
        echo 4444;
    }

?>