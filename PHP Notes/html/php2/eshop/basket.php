<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
?>
<html>
<head>
	<title>Корзина пользователя</title>
</head>
<body>
	<h1>Ваша корзина</h1>
<?php
	$goods = myBasket();
	if( !is_array($goods) ){
		echo 'Произошла ошибка при выводе товаров';
		exit;
	}
	if( $goods ){
		echo "<p>Вернуться в <a href='catalog.php'>каталог</a></p>";
	}else{
		echo "<p>Корзина пуста! <a href='catalog.php'>В каталог</a></p>";
	}
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
	$i= 1; $sum= 0;
	foreach($goods as $item){
?>
		<tr>
			<td>$i</td>
			<td><?php echo $item['title'] ?></td>
			<td><?php echo $item['author'] ?></td>
			<td><?php echo $item['pubyear'] ?></td>
			<td><?php echo $item['price'] ?></td>
			<td><?php echo $item['quantity'] ?></td>
			<td><a href="delete_from_basket.php?id=<?php echo $item['id'] ?>">Удалить</a></td>
		<tr>
<?php
		$i++;
		$sum += $item['price'] * $item['quantity'];
	}
?>
</table>

<p>Всего товаров в корзине на сумму: <?php echo $sum ?> руб.</p>

<div align="center">
	<input type="button" value="Оформить заказ!"
                      onClick="location.href='orderform.php'" />
</div>

</body>
</html>







