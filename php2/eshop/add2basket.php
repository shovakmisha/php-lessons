<?php
	//
	require "inc/lib.inc.php";
	require "inc/config.inc.php";

	$id = clearInt( $_GET['id'] );
	$q = 1;

    add2Basket($id, $q);

    header("Location: catalog.php");
    exit;