<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Корзина пользователя</title>
</head>
<body>
	<h1>Ваша корзина</h1>
<?php

    $goods = myBasket();


    if( !is_array($goods) ){
        //echo "Произошла ошибка при выводе товаров";
        echo "<a href='catalog.php'>Вернутся в каталог</a>";
        exit;
    }

    echo '<p>';

        if( $goods ){
            echo "<a href='catalog.php'>Вернутся в каталог</a>";
        }else{
            echo "<span>Корзина пуста!</span>";
            echo "<a href='catalog.php'>Вернутся в каталог</a>";
        }


    echo '</p>';
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>N п/п</th>
	<th>Название</th>
	<th>Автор</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>Количество</th>
	<th>Удалить</th>
</tr>
<?php

    $goods = myBasket();
    $i = 1;
    $sum = 0;

	foreach ( $goods as $product ){ ?>

        <tr>
            <td>    <?php echo $i; ?>                       </td>
            <td>    <?php echo $product['title']; ?>        </td>
            <td>    <?php echo $product['author']; ?>       </td>
            <td>    <?php echo $product['pubyear']; ?>      </td>
            <td>    <?php echo $product['price']; ?>        </td>
            <td>    <?php echo $product['quantity']; ?>     </td>
            <td><a href="delete_from_basket.php?id=<?php echo $product['id']?>">Удалить</a></td>
        </tr>

    <?php
    $i++;
    $sum += $product['price'] * $product['quantity'];
    }
?>
</table>

<p>Всего товаров в корзине на сумму: <?php echo $sum; ?> руб.</p>

<div align="center">
	<input type="button" value="Оформить заказ!"
                      onClick="location.href='orderform.php'" />
</div>

</body>
</html>







