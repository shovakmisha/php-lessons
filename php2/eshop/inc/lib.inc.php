<?php

    require_once ('config.inc.php');

// check fields

    function clearInt($data){
        return abs( (float) $data );
    }

    function clearStr($data){
        global $link;
        return mysqli_real_escape_string($link, trim (strip_tags($data) ) );
    }

// add products to database

    function addItemToCatalog($title, $author, $pubyear, $price){
        global $link;
        $sql = 'INSERT INTO catalog (title, 
                                      author, 
                                      pubyear, 
                                      price) 
                VALUES (?, ?, ?, ?)';

        if (!$stmt = mysqli_prepare($link, $sql))
            return false;
        mysqli_stmt_bind_param($stmt, "ssid",
                                                    $title,
                                                    $author,
                                                    $pubyear,
                                                    $price);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    }

// Select all products from DB to catalog

    function selectAllItems(){
        global $link;
        $sql = 'SELECT id, title, author, pubyear, price FROM catalog';

        if(!$result = mysqli_query($link, $sql))
            return false;

        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $items;
    }

// Save products in basket

    function saveBasket(){
        global $basket;
        $basket = base64_encode(serialize($basket));
        setcookie('basket', $basket, 0x7FFFFFFF);
    }

    function basketInit(){
        global $basket, $count;
        if(!isset($_COOKIE['basket'])){
            $basket = ['orderid' => uniqid()];
            saveBasket();
        }else{
            $basket = unserialize(base64_decode($_COOKIE['basket']));
            $count = count($basket) - 1;
        }
        //setcookie('basket' );
        //print_r($basket);
    }

    function add2Basket($id, $q){
        global $basket;
        $basket[$id] = $q;
        saveBasket();
    }

// Basket Page

    function myBasket(){
        global $link, $basket;
        $goods = array_keys($basket);
        array_shift($goods);
        if( count($goods) )
            $ids = implode(",", $goods);
        else
            $ids = 0;
        $sql = "SELECT id, author, title, pubyear, price FROM catalog WHERE id IN ($ids)";
        if(!$result = mysqli_query($link, $sql))
            return false;
        $items = result2Array($result);
        mysqli_free_result($result);
        return $items;
    }

    function result2Array($data){
        global $basket;
        $arr = [];
        while($row = mysqli_fetch_assoc($data)){
            $row['quantity'] = $basket[$row['id']];
            $arr[] = $row;
        }
        return $arr;
    }

// Delete products from Basket

function deleteItemFromBasket($id){
    global $basket;
    unset($basket[$id]);
    saveBasket();

}

// Save order
    function saveOrder($dt){
        global $link, $basket;
        $goods = myBasket();
        $stmt = mysqli_stmt_init($link);
        $sql = 'INSERT INTO orders (
                                    title,
                                    author,
                                    pubyear,
                                    price,
                                    quantity,
                                    orderid,
                                    datetime)
                                    VALUES (?, ?, ?, ?, ?, ?, ?)';

        if (!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error";
            return false;
        }

        foreach($goods as $item){
            mysqli_stmt_bind_param($stmt, "ssidisi",
                                                            $item['title'],
                                                            $item['author'],
                                                            $item['pubyear'],
                                                            $item['price'],
                                                            $item['quantity'],
                                                            $basket['orderid'],
                                                            $dt);
            mysqli_stmt_execute($stmt);
        }


        mysqli_stmt_close($stmt);
        setcookie('basket', '', time()/* -3600 щоб наверняка */ );
        return true;
    }

// Orders Page

    function getOrders(){
        global $link;

        if( !is_file(ORDERS_LOG) )
            return false;

    /* Получаем в виде массива персональные данные пользователей из файла */
        $orders = file(ORDERS_LOG);

    /* Массив, который будет возвращен функцией */
        $allorders = [];

        foreach ($orders as $order) {
            list($name, $email, $phone, $address, $orderid, $date) = explode("|", $order);

        /* Промежуточный массив для хранения информации о конкретном заказе */
            $orderinfo = [];

            /* Сохранение информацию о конкретном пользователе */
            $orderinfo["name"] = $name;
            $orderinfo["email"] = $email;
            $orderinfo["phone"] = $phone;
            $orderinfo["address"] = $address;
            $orderinfo["orderid"] = $orderid;
            $orderinfo["date"] = $date;

        /* SQL-запрос на выборку из таблицы orders всех товаров для конкретного покупателя */
            $sql = "SELECT title, author, pubyear, price, quantity
                        FROM orders
                        WHERE orderid = '$orderid' AND datetime = $date";

        /* Получение результата выборки */
            if(!$result = mysqli_query($link, $sql))
                return false;

            $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);

        /* Сохранение результата в промежуточном массиве */
            $orderinfo["goods"] = $items;

            /* Добавление промежуточного массива в возвращаемый массив */
            $allorders[] = $orderinfo;
        }

        return $allorders;
    }

