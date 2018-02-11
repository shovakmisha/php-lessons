<?php
    class NumbersSquared implements Iterator{
        private $start, $end, $current;

        function __construct($start, $end)
        {
            $this->start = $start;
            $this->end = $end;
        }

        function rewind()
        {
            // TODO: Implement rewind() method.

            if($this->current > $this->end){
                return false;
            }

            return true;
        }

        function next()
        {
            // TODO: Implement next() method.
            $this->current++;
        }

        function key()
        {
            // TODO: Implement key() method.

            return $this->current;
        }

        function current()
        {
            // TODO: Implement current() method.
            return $this->current * $this->current;
        }
        public function valid() {
            $var = $this->current() !== false;
            echo "valid: {$var}\n";
            return $var;
        }
    }

    $obj = new NumbersSquared(1,5);

    foreach($obj as $num => $square){
        echo "Квадрат числа $num = $square\n";
    }

