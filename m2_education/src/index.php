<?php

if ($_SERVER['REQUEST_URI'] == '/favicon.ico') {
    die;
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'App.php';
$app = new App();
$app->run();

?>