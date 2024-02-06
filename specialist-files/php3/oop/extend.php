<?php

    class SimpleHouse {
        public $model = "";
        public $square = 0;
        public $floors = 0;
        public $color = "none";

        function __construct($model, $square, $floors)
        {
            $this->model = $model;
            $this->square = $square;
            $this->floors = $floors;
        }

        function startProject(){
            echo "Start. Model: {$this->model} <br>";
        }

        function stopProject(){
            echo "Stop. Model: {$this->model} <br>";
        }

        public function printWheels() {
            echo $this->color;
        }

        function build(){
            echo "Build. House: {$this->square} <br>";
        }

        function paint(){
            echo "Paint. Color: {$this->model} <br>";
        }

    }

    $simple = new SimpleHouse("A-100-123", 120, 2);
    $simple->color = "red";
    $simple->startProject();
    $simple->build();
    $simple->paint();
    $simple->stopProject();





    class SuperHouse extends SimpleHouse {

        public $fireplace = true;
        public $patio = true;

        public function fire() {
            if( $this->fireplace )
                echo "Fueled fireplace <br>";
        }
    }

    $super = new SuperHouse("A-100-123", 120, 2);
    $super->color = "green";
    $super->startProject();
    $super->build();
    $super->paint();
    $super->fire();
    $super->stopProject();


?>