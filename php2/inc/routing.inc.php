<?php
$id = '';
if( isset($_GET['id'])){
	$id = $_GET['id'];
}
switch($id){
	case 'contact': include 'inc/contact.inc.php'; break;
	case 'about': include 'inc/about.inc.php'; break;
	case 'info': include 'inc/info.inc.php'; break;
	case 'log': include 'inc/view-log.inc.php'; break;
	case 'gbook': include 'inc/gbook.inc.php'; break;
	default: include 'inc/index.inc.php';
}