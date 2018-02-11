<?php

    class SuperUser extends User implements ISuperUser {

        function getInfo(){
            echo '<p>getInfo()</p>';
        }

        public $role;

        function __construct($name, $login, $password, $role)
        {
            parent::__construct($name, $login, $password);
            $this->role = $role;

            $numargs = func_num_args();
            echo "<hr>"."Количество аргументов: $numargs\n";
            //if ($numargs >= 2) {
            //    echo "Второй аргумент: " . func_get_arg(1) . "\n";
            //}
            print_r( func_get_args() );
            //for ($i = 0; $i < $numargs; $i++) {
            //    echo "<p>"."Аргумент №$i: " . $arg_list[$i] . "\n"."</p>";
            //}

            echo "<hr>";

        }

        function showinfo(){
            parent::showinfo();
            "<p>Роль: ".$this->role;
        }

    }