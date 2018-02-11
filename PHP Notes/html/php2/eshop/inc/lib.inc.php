<?php
 function clearInt($data){
	return abs((int)$data);
}
function clearStr($data){
		global $link; // щоб заціпило і її
		return mysqli_real_escape_string($link, trim(strip_tags($data)));
	}
// Добавляю в каталог використовуючи підготовлені запроси
function addItemToCatalog($title, $author, $pubyear, $price){
	global $link;
	$sql = "INSERT INTO catalog(
							title,
							author,
							pubyear,
							price)
					VALUES (?, ?, ?, ?)";
	if( !$stmt = mysqli_prepare($link, $sql) ){
		return false;
	}
	mysqli_stmt_bind_param($stmt, "ssii", $title, $author, $pubyear, $price);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	return true;
}

// роблю корзину, використовуючи кукі.
function saveBasket(){
	global $basket;
	$basket = base64_encode(serialize($basket)); // Обробляю base64, щоб наверняка
	setcookie('basket', $basket, 0x7FFFFFFF);
}
function basketInit(){
	global $basket, $count;
	if( !isset($_COOKIE['basket']) ){ // Якщо у користувача нема кукі з мого сайта 
		$basket = array('orderid' => uniqid() ); // Згенерувати йому ідентафікатор
		saveBasket();
	}else{
		$basket = unserialize(base64_decode($_COOKIE['basket']));
		
		$count = count($basket)-1; // Тому, що у корзині ідентафікатор
	}
}

function add2Basket($id, $q){
	global $basket;
	$basket[$id] = $q;
	saveBasket();
}

// Вибираю товари з каталога
function selecrALLItems(){
	$sql = "SELECT id, title, author, pubyear, price FROM catalog";
	global $link;
	if( !$result = mysqli_query($link, $sql) ){
		return false;
	}
	$items = mysqli_fetch_all( $result, MYSQLI_ASSOC );
	mysqli_free_result($result);
	return $items;
}

// Вибираю товари з корзини

function myBasket(){
	global $link, $basket;
	$goods = array_keys($basket); // масив ключів кукі ( ідентифікатор користувача, ідентифікатори товарів, яких він добавив )
	array_shift($goods);  // залишаю тільки ідентифікатори товарів, яких він добавив
	if( count($goods) ){
		$ids = implode(",", $goods); // масив товарів, перероблений в строку
	}else{
		$ids = 0; // Щоб $ids не був пустий, бО якщо буде WHERE id IN (пусто), запрос не пруйде і повернеться false
	}
	$sql = "SELECT id, author, title, pubyear, price
			FROM catalog
			WHERE id IN ($ids)"; // Видрати з БД ті строки, ідентифікатор яких співпадає з ідентифікаторами товарів, яких він добавив (вони вказані в $ids, через кому).
	if(!$result = mysqli_query($link, $sql) ){
		return false;
	}
	
	$items = result2Array($result);
	mysqli_free_result($result);
	return  $items;
}
// Вибираю товари з корзини
function result2Array($data){
	global $basket;
	$arr = array();
	while( $row = mysqli_fetch_assoc($data) ){ // поки в БД є книги
		$row['quantity']= $basket[$row['id']]; // $row['id'] - дасть ідентифікатор текущої книги в циклі, а при добаленні товара в корзину в кукі користувача відправляється масив, у якого ключ - це ідентифікатор товару, а значення ключа - це к-сть товара, яку замовив користувач
		$arr[]= $row; // добавити в $arr масив, у якому буде така інф про товар -  author, title, pubyear, price, quantity(к-сть)
	}
	return $arr;
}


// Видаляаю товари з корзини
function deleteItemFromBasket($id){
	global $basket;
	unset($basket[$id]);
	saveBasket();
}