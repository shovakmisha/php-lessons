<?php
header('Content-Type: text/html; charset=utf-8');

    const DB_HOST     = 'localhost',
          DB_LOGIN    = 'root',
          DB_PASSWORD = 123,
          DB_NAME     = 'eshop',
          ORDERS_LOG  = 'orders.log';
    // що в корзині
          $basket     = [];
    // к-сть товарів в корзині
          $count      = 0;

    $link = mysqli_connect(
        DB_HOST,
        DB_LOGIN,
        DB_PASSWORD,
        DB_NAME)
    or die(mysqli_connect_error());

    basketInit();

    mysqli_set_charset($link, 'utf8');