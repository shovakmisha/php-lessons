<?php

	include 'project.php';

	echo '<hr>';

	class Connection{
	  function __construct(){
	    echo __CLASS__."<br>";
	  }
	}

	echo "Из GLOBAL:<br>";

	$obj = new \Connection;
	$obj1 = new \Project\Connection;
	$obj2 = new \Project\Sub\Connection;

?>