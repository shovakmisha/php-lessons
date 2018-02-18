<?php

require_once 'ivan/PluginIvana.class.php';


echo 444;
//class Favorites
//{
	//private $plugins = [];

	//protected $predicate, $path;

	//function __construct($path, $predicate)
	//{
	//	//Находим файлы определенного типа
//
	//	$this->predicate = $predicate;
	//	$this->path = $path;
	//	$isExist = false;
//
	//	foreach (glob("../classes/*/*.php") as $filename) {
	//		// echo "$filename размер " . filesize($filename) . "<br>";
	//		 if( is_file( $filename ) ){
	//			 //require_once trim($filename);
//
//
	//			 echo $filename;
	//			 $isExist = true;
	//		 }
	//	}
	//	//if( $isExist ) $this->findPlugins();
	//}

	//private function findPlugins(){
	//	foreach ( get_declared_classes() as $class ){
	//		//$rs = new ReflectionClass($class);
	//		//if( $rs->implementsInterface('IPlugin') ){
	//		//	//$this->plugins[] = $rs;
	//		//}
	//		echo 333;
	//		echo '<br>';
	//	}
	//}

	// function getFavorites( $methodName ){
	// 	$list = [];
	// 	$items = [];
	// 	foreach ( $this->plugins as $rc ):
	// 		if( $rc->hasMethod($methodName) ):
	// 			$rm = $rc->getMethod( $methodName );
	// 			if( $rm->isStatic() )
	// 				$items = $rm->invoke(null);
	// 			else
	// 				$items = $rm->invoke($rc->newInstance());
	// 			$list[] = $items;
	// 		endif;
	// 	endforeach;
	// 	return $list;
	// }



//}

//$fav = new Favorites;



	//static::self function getName{
	//
	//}

 // private function findPlugins() {}
//
 // function getFavorites($methodName) {
 //   $list = [];
 // }

//}
