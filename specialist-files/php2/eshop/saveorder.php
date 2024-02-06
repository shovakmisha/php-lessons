<?php
	require "inc/lib.inc.php";

    $datetime = time();
    $orderId = $basket['orderid'];

    $name = clearStr($_POST['name']);
    $email = clearStr($_POST['email']);
    $phone = clearStr( $_POST['phone'] );
    $address = clearStr($_POST['address']);

    $order = "$name|$email|$phone|$address|$orderId|$datetime\n";

    file_put_contents('admin/'.ORDERS_LOG, $order, FILE_APPEND);

    saveOrder($datetime);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Сохранение данных заказа</title>
</head>
<body>
	<p>Ваш заказ принят.</p>
	<p><a href="catalog.php">Вернуться в каталог товаров</a></p>
</body>
</html>