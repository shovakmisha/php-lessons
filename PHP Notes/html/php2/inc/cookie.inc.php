<?php
//setcookie("userName", 'John');
	$visitCounter = 0;
	if( isset($_COOKIE["count"]) ){
		$visitCounter = $_COOKIE["count"];
	}
	$visitCounter++;
	
	$lastVisit = '';
	if( isset($_COOKIE["lastVisit"]) ){
		$lastVisit = date('d-m-Y H:i:s', $_COOKIE["lastVisit"]);
	}
	setcookie('count', $visitCounter, 0x7FFFFFFF);
	
	setcookie('lastVisit', time(), 0x7FFFFFFF);
?>