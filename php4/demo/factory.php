<?php

    interface Shape{
        function draw();
    }

    class Rectangle implements Shape{
        function draw()
        {
            // TODO: Implement draw() method.
            echo __METHOD__;
            echo '<br>';
        }
    }

    class Square implements Shape{
        function draw()
        {
            // TODO: Implement draw() method.
            echo __METHOD__;
            echo '<br>';
        }
    }

    class Circle implements Shape{
        function draw()
        {
            // TODO: Implement draw() method.
            echo __METHOD__;
            echo '<br>';
        }
    }

    class ShapeFactory{
        function getShape($type){
            $type = strtoupper($type);
            switch ($type){
                case "R": return new Rectangle();
                case "S": return new Square();
                case "C": return new Circle();
                default: throw new Exception("Wrong type!");
            }
        }
    }

    $f = new ShapeFactory();

    $r = $f->getShape('r');
    $s = $f->getShape('s');
    $c = $f->getShape('c');

    $r->draw();
    $s->draw();
    $c->draw();

    $z = $f->getShape('z');


?>


























