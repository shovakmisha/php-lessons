<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>������</title>
</head>

<body>
<h1>������</h1>
<?php
$name = "���� ������";

$str1 = "��� $name \$a100 \" \\ \n \r \t ������";

$str2 = '��� \' $name \$a100 \" \\ \n \r \t ������';

$str3 = "

��� ����� ������ ������

";

$a = <<<EOF
<pre>
����� ������ ������ �������
����� ������ ������ �������
����� ������ ������ ������� $name
����� ������ ������ �������
����� ������ ������ �������
����� ������ ������ �������
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
