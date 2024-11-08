<?php
    const LOGIN_PASSWORDS = '.htpasswd';

    function getHash($password){
        $hash = password_hash($password, PASSWORD_BCRYPT);
        return $hash;
    }

    function checkHash($password, $hash){
        return password_verify($password, $hash);
    }

    function saveUser($login, $hash){
        $str = "$login:$hash\n";
        if(file_put_contents(LOGIN_PASSWORDS, $str, FILE_APPEND))
            return true;
        else
            return false;
    }

    function userExists($login){
        if(!is_file(LOGIN_PASSWORDS))
            return false;
        $users = file(LOGIN_PASSWORDS);
        foreach($users as $user){
            if(strpos($user, $login.':') !== false)
                return $user;
        }
        return false;
    }

    function logOut(){
        session_destroy();
        header('Location: secure/login.php');
        exit;
    }