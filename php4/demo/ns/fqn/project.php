<?php
	namespace Project;
	include 'subproject.php';

	echo '<hr>';

	class Connection{
	  function __construct(){
	    echo __CLASS__."<br><br>";
	  }
	}
	echo "Из PROJECT:<br><br>";

	$obj = new \Project\Connection;
	$obj = new \Project\Sub\Connection;

?>