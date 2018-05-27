<?
if($_SERVER['REQUEST_METHOD']=='POST')
	print_r($_POST);
else
	echo 'Another method';
?>