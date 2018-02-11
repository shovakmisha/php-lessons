<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Условный оператор if</title>
</head>

<body>
<?php
$a = 0;

if ($a == 0) {
	print "УРА";
}
else {
	print "Все плохо!";
}

if ($a === false) {
	print "УРА";
}
else {
	print "Все плохо!";
}
?>
</body>
</html>
