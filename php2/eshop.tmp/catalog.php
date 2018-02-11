<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
?>
<html>
<head>
	<title>Каталог товаров</title>
</head>
<body>
<p>Товаров в <a href="basket.php">корзине</a>: <?php echo $count?></p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>Название</th>
	<th>Автор</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>В корзину</th>
</tr>
<?php
	$goods = selecrALLItems();
	if( !is_array($goods) ){
		echo 'Проблема з товарами';
		exit;
	}
	if( !$goods ){
		echo 'Нет товаров';
		exit;
	}
	foreach($goods as $item){
		print <<<HERE
		<tr>
			<td>$item[title]</td>
			<td>$item[author]</td>
			<td>$item[pubyear]</td>
			<td>$item[price]</td>
			<td><a href="add2basket.php?id=$item[id]">В корзину</a></td>
		<tr>
HERE;
	}
?>
</table>
</body>
</html>