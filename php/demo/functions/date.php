<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Дата и время</title>
</head>

<body>
<h1>
	<a href="http://ru.php.net/manual/ru/ref.datetime.php">
		Дата и время
	</a>
</h1>
UNIX timestamp: <?=time()?><br>
Сегодня: <?=date("d.m.Y H:i:s")?><br>
Через 100 дней: <?=date("d.m.Y", time() + 100*24*60*60)?><br>
Swatch Internet: <?=date("B")?><br>
Дата в формате RFC2822: <?=date("r")?><br>
1 января 2006 года в Москве: <?=mktime(0,0,0,1,1,2006)?><br>
Эпоха UNIX заканчивается: <?=date("d.m.Y H:i:s", 0x7FFFFFFF)?><br>
<hr>
<a href="http://ru.php.net/manual/ru/function.date.php">date()</a><br>
<a href="http://ru.php.net/manual/ru/function.mktime.php">mktime()</a><br>
</body>
</html>
