<?php
	//require "secure/session.inc.php";
	require "../inc/lib.inc.php";

    $orders = getOrders();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Поступившие заказы</title>
	<meta charset="utf-8">
</head>
<body>
<h1>Поступившие заказы:</h1>
<?php

    foreach ($orders as $order){
        $date = date('d-m-y h:i', $order['date']);
        ?>

        <hr>
        <h2>Заказ номер: <?php echo $order['orderid']; ?></h2>
        <p><b>Заказчик</b>: <?php echo $order['name']; ?></p>
        <p><b>Email</b>: <?php echo $order['email']; ?></p>
        <p><b>Телефон</b>: <?php echo $order['phone']; ?></p>
        <p><b>Адрес доставки</b>: <?php echo $order['address']; ?></p>
        <p><b>Дата размещения заказа</b>: <?php echo $date; ?></p>

        <h3>Купленные товары:</h3>
        <table border="1" cellpadding="5" cellspacing="0" width="90%">
            <tr>
                <th>N п/п</th>
                <th>Название</th>
                <th>Автор</th>
                <th>Год издания</th>
                <th>Цена, руб.</th>
                <th>Количество</th>
            </tr>
            <?php

            $goods = $order['goods'];
            $i = 1;
            $sum = 0;

            foreach ($goods as $good){ ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $good['title']; ?></td>
                    <td><?php echo $good['author']; ?></td>
                    <td><?php echo $good['pubyear']; ?></td>
                    <td><?php echo $good['price']; ?></td>
                    <td><?php echo $good['quantity']; ?></td>
                </tr>
            <?php
                $i++;
                $sum += $good['price'] * $good['quantity'];
            } ?>
        </table>
        <p>Всего товаров в заказе на сумму: <?php echo $sum; ?> руб.</p>

    <?php
    }?>



</body>
</html>