<?php

	 function loadClass($class_name) {
	 	require_once "classes/".$class_name.".class.php";
	 }

	 //function loadInterface ($class_name) {
	 //	require_once "classes/$class_name.interface.php";
	 //}

	 //function loadSomething ($class_name) {
	 //   // ...
	 //}

	 class Main{
	 	public static function autoload($class_name){ // Метод-обработчик должен быть статическим.
		    require_once "classes/".$class_name.".class.php";
	 	}
	 }

// Регистрация функций
	 //spl_autoload_register('loadClass');
	 //spl_autoload_register('loadSomething');
	 //spl_autoload_register('loadInterface', true, 1);


// Список зарегистрированных функций
	  var_dump(spl_autoload_functions());

// Удаление функции из списка зарегистрированных
	 // spl_autoload_unregister('loadSomething');

// Регистрация статического метода класса
	  spl_autoload_register(['Main', 'autoload']);


	//spl_autoload_register(['Shovak', 'autoload']);
	//class Shovak{
	//	public static function autoload(){
	//		require_once "./classes/$class_name.class.php";
	//	}
	//}

	echo '<hr>';


	$obj = new Shovak('Michael');

	$obj->call();

	$obj->showInfo();

?>