<?php


class User extends UserAbstract{

    function showinfo(){
        echo "<p>Имя: ".$this->name;
        echo "<p>Логин: ".$this->login;
        echo "<p>Пароль: ".$this->password;
    }

    function __construct($name, $login, $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    //function __destruct()
    //{
    //    // TODO: Implement __destruct() method.
    //    echo "Деструктор заработав";
    //}

}