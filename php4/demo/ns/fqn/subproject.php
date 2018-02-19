<?php
	namespace Project\Sub;

	class Connection{
	  function __construct(){
	    echo __CLASS__."<br>";
	  }
	}
	echo "Из PROJECT\SUB:<br><br>";

	$obj = new \Project\Sub\Connection;

	$str = 'str';

	function strlen($str = ''){
		echo 777;
	}

	echo strlen($str);

?>