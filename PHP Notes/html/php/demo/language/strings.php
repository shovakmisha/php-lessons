<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Строки</title>
</head>

<body>
<h1>Строки</h1>
<?php
$name = "Вася Пупкин";

$str1 = "Это $name \$a100 \" \\ \n \r \t строка";

$str2 = 'Это \' $name \$a100 \" \\ \n \r \t строка';

$str3 = "

Это новая строка текста

";

$a = <<<EOF
<pre>
Много текста самого разного
Много текста самого разного
Много текста самого разного $name
Много текста самого разного
Много текста самого разного
Много текста самого разного
</pre>
EOF;

$result = $str1 . $str2;

echo $str1, "<br>", $str2, "<br>", $a, "<br>", $result;

$beer = 'Heineken';
echo "$beer's taste is great"; // works, "'" is an invalid character for varnames
echo "He drunk some $beers"; // won't work, 's' is a valid character for varnames
echo "He drunk some ${beer}s"; // works

echo "<br>";

echo $name{0};

?>

</body>
</html>
