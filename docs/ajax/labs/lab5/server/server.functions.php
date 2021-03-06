<?php
/*
** Функции работы сервера
*/
$serverFunctions = array
(
	'addBook', 			// Добавление новой книги
	'deleteBook',		// Удаление книги
	'getBooks',			// Возврат всех книг по категории
	'getCategories', 	// Возврат всех категорий
	'replaceBook',		// Замена книги по ID
	'registerSession',	// Регистрация новой сессии
	'addToBasket',		// Добавление книги в корзину
	'getBasket',		// Список книг в корзине
	'emptyBasket'		// Очистка корзины
);

/* 
** Реализация Функции работы сервера
*/
require('server.classes.php');
require('server.database.php');

// Возврат всех категорий
function getCategories()
{
	$categories = array();
	$db = new ServerDatabase();
	$db->newQuery('SELECT id, title, parent FROM category');
	$rows = $db->execute();
	foreach($rows as $row)
	{
		$category = new Category();
		$category->fillFromArray($row);
		$categories[] = $category;
	}
	return $categories;
}

// Возврат всех книг по категории
function getBooks($categoryId)
{
	$books = array();
	$db = new ServerDatabase();
	$db->newQuery('SELECT id, author, title, image, category FROM book WHERE category = %1');
	$db->addParameter($categoryId);
	$rows = $db->execute();
	foreach($rows as $row)
	{
		$book = new Book();
		$book->fillFromArray($row);
		$books[] = $book;
	}
	return $books;
}

// Добавление новой книги
function addBook(Book $newBook)
{
	$db = new ServerDatabase();
	$db->newQuery("INSERT INTO book (author, title, image, category) VALUES ('%1', '%2', '%3', %4)");
	$db->addParameter($newBook->author);
	$db->addParameter($newBook->title);
	$db->addParameter($newBook->image);
	$db->addParameter($newBook->category);
	$db->execute();
	return ($db->getLastInsertId() > 0);
}

// Удаление книги
function deleteBook($bookId)
{
	$db = new ServerDatabase();
	$db->newQuery('DELETE FROM book WHERE id = %1');
	$db->addParameter($bookId);
	$db->execute();
	return ($db->getRowsAffected() > 0);
}

// Замена книги по ID
function replaceBook(Book $newBook)
{
	$db = new ServerDatabase();
	$db->newQuery("UPDATE book SET author='%2', title='%3', image='%4', category=%5 WHERE id=%1");
	$db->addParameter($newBook->id);
	$db->addParameter($newBook->author);
	$db->addParameter($newBook->title);
	$db->addParameter($newBook->image);
	$db->addParameter($newBook->category);
	$db->execute();
	return ($db->getRowsAffected() > 0);
}

// Регистрация новой сессии
function registerSession()
{
	$db = new ServerDatabase();
	
	// Очистка корзины
	$oldTime = time() - 12 * 60 * 60;
	
	// Список сессий, к которым обращались последний раз 12 часов назад
	$db->newQuery("SELECT session, MAX(time_stamp) AS last_time
					FROM basket
					GROUP BY session
					HAVING last_time < $oldTime");
	
	// Удаление этих сессий
	$rows = $db->execute();
	foreach($rows as $row)
		emptyBasket($row['session'], $db);
	
	// Генерация нового ID сессии
	return md5('registerSession' . time());
}

// Добавление книги в корзину
function addToBasket($sessionId, $bookId)
{
	$db = new ServerDatabase();	
	try
	{
		$db->newQuery("INSERT INTO basket (session, book, time_stamp) VALUES ('%1', %2, %3)");
		$db->addParameter($sessionId);
		$db->addParameter($bookId);
		$db->addParameter(time());
		$db->execute();
		return true;	
	}
	catch (Exception $e)
	{
		return false;
	}
}

// Список книг в корзине
function getBasket($sessionId)
{
	$books = array();
	$db = new ServerDatabase();
	$db->newQuery("SELECT 
						book.id AS id, 
						book.author AS author, 
						book.title AS title, 
						book.image AS image, 
						book.category AS category
					FROM book 
						INNER JOIN basket ON book.id = basket.book
					WHERE basket.session = '%1'");
	$db->addParameter($sessionId);
	$rows = $db->execute();
	foreach($rows as $row)
	{
		$book = new Book();
		$book->fillFromArray($row);
		$books[] = $book;
	}
	return $books;
}

// Очистка корзины
function emptyBasket($sessionId, $db=null)
{
	if (!$db) $db = new ServerDatabase();	
	try
	{
		$db->newQuery("DELETE FROM basket WHERE session = '%1'");
		$db->addParameter($sessionId);
		$db->execute();
		return true;	
	}
	catch (Exception $e)
	{
		return false;
	}
}
?>