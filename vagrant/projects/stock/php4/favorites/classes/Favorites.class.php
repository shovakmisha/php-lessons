<?php

class Favorites
{
	private $plugins = [];

	protected $predicate, $path;

	function __construct(/*$path, $predicate*/)
	{
		//Находим файлы определенного типа

		//$this->predicate = $predicate;
		//$this->path = $path;
		$isExist = false;

		foreach ( glob("classes/*/*.class.php") as $filename ) {
			 //echo "$filename размер " . filesize($filename) . "<br>";

			 if( is_file($filename) ){
                 include_once($filename);
                 $isExist = true;
			 }

		}

		if( $isExist ) {
		    //echo 1;
		  $this->findPlugins();
        }else{
		    //echo 5;
        }


	}

	private function findPlugins(){
		foreach ( get_declared_classes() as $class ){
			$rs = new ReflectionClass($class);
			if( $rs->implementsInterface('IPlugin') ){
				$this->plugins[] = $rs; // у масиві будуть класи оброблені рефлекшном
			}
		}
	}

	 function getFavorites( $methodName ){
	 	$list = [];
	 	$items = [];
	 	foreach ( $this->plugins as $rc ):
	 		if( $rc->hasMethod($methodName) ):
	 			$rm = $rc->getMethod( $methodName );
	 			if( $rm->isStatic() )
	 				$items = $rm->invoke(null); // чому тут null ы нахер це присвоювати змынныъ
	 			else
	 				$items = $rm->invoke($rc->newInstance());
	 			$list[] = $items;
	 		endif;
	 	endforeach;
	 	return $list;
	 }



}

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
