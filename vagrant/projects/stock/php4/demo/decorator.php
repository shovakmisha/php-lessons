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

abstract class ShapeDecorator implements Shape{
    protected $decoratedShape;
    function __construct(Shape $decoratedShape)
    {
        $this->decoratedShape = $decoratedShape;
    }
    function draw()
    {
        // TODO: Implement draw() method.
        $this->decoratedShape->draw();
    }
}

class RedShapeDecorator extends ShapeDecorator {
    function __construct(Shape $decoratedShape)
    {
        parent::__construct($decoratedShape);
    }
    private function setRedTopBorder(){
        echo "top BORDER RED";
    }
    private function setRedBottomBorder(){
        echo "bottom BORDER RED";
    }
    function draw()
    {
        $this->decoratedShape->draw();
        $this->setRedTopBorder();
        $this->setRedBottomBorder();
    }
}

$c = new Circle();
$c->draw();

echo '<br>';

$r = new RedShapeDecorator( new Circle );
$r->draw();



?>


























