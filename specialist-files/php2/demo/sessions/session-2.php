﻿<?php session_start();
$name = $_SESSION["name"];
$age = $_SESSION["age"];
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Демо сессии</title>
</head>
<body>
<h1>Демо сессии</h1>
<a href="session-1.php">Демонстрация сессии</a><br>
<a href="session_destroy.php">Закрыть сессию</a><br><br>
<?php
if ($name and $age) {	
	if ($name and $age) {
		echo "<h1>Привет, $name</h1>";
		echo "<h3>Тебе $age лет</h3>";
	}
	else {
		print "<h3>Заполните все поля!</h3>";
	}
}
?>
</body>
</html>
