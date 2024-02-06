<?php

    class MyClass
    {
        public $public = 'Public';
        protected $protected = 'Protected';
        private $private = 'Private';

        private $name = "name";

        function printHello()
        {
            echo $this->public;
            echo $this->protected;
            echo $this->private;
            echo $this->name;
        }

        function __set($x, $y){
            echo 'set'."<br>";
        }

    }

    $obj = new MyClass();

    $obj->name = "name";

    //echo $obj->name;

    echo $obj->public; // Работает
    //echo $obj->protected; // Неисправимая ошибка
    //echo $obj->private; // Неисправимая ошибка
    $obj->printHello(); // Выводит Public, Protected и Private



    class MyClass2 extends MyClass
    {
        // We can redeclare the public and protected method, but not private
        protected $protected = 'Protected2';

        function printHello()
        {
            echo $this->public;
            echo $this->protected;
            //echo $this->private;
        }
    }

    echo '<hr>';

    $obj2 = new MyClass2();
    echo $obj2->public; // Works
    //echo $obj2->private; // Undefined
    //echo $obj2->protected; // Fatal Error
    $obj2->printHello(); // Shows Public, Protected2, not Private

?>

<pre>
<?php
print_r($obj);
?>
</pre>
