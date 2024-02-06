<?php


    class Window{
        function __construct($d, $m, $v)
        {
            $this->dialog = $d;
            $this->modal = $m;
            $this->visible = $v;
        }
    }

// Це стандартно, як я б зробив. Але тут не понятно при створенні обєкта що це за аргументи, легко запутатись у якому порядку їх ставити
    $window = new Window(true, false, false);

// Шаблон білдер. Типу query. Можна бродити по обєкту, оскільки завжди повертається обєкт і по імені метода зрозуміло що він робить

    class CreateWindow{
        function setDialog($flag=false){
            $this->dialog = $flag;
            return $this;
        }
        function setModal($flag=false){
            $this->modal = $flag;
            return $this;
        }
        function setVisible($flag=false){
            $this->visible = $flag;
            return $this;
        }
        function create(){
            return new Window($this->dialog, $this->modal, $this->visible);
        }
    }

    $c = new CreateWindow();
    $w = $c->setVisible(true)->setDialog(true)->setModal(true)->create();

?>