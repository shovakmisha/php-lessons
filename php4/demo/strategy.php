<?php
// це принцип шаблона проектування. В залежності від даних, шо прийшли, буде вибиратись інша стратегія для їх обробки
    // function foo($a, $b){
    //     if($a == $b ) return 0;
    //     return $a < $b ? -1 : 1;
    // }

    interface Strategy{
        function doOp($n1, $n2);
    }

    class Add implements Strategy{
        function doOp($n1, $n2)
        {
            // TODO: Implement doOp() method.
            return $n2 + $n2;
        }
    }

    class Sub implements Strategy{
        function doOp($n1, $n2)
        {
            // TODO: Implement doOp() method.
            return $n2 - $n2;
        }
    }

    class Mult implements Strategy{
        function doOp($n1, $n2)
        {
            // TODO: Implement doOp() method.
            return $n2 * $n2;
        }
    }

    class Context{
        private $s;
        function __construct(Strategy $s) // тут має бути обєкт типу Strategy
        {
            $this->s = $s;
            // echo get_class($s);
        }

        function execute($n1, $n2){
            return $this->s->doOp($n1, $n2);
        }
    }

    $add = new Context( new Add );

    //if( $c instanceof Strategy ){
    //    echo 55555;
    //}

    echo $add->execute(2,3);

?>