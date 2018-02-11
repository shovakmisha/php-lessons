<HTML>
<HEAD>
<TITLE>fopen</TITLE>
</HEAD>
<BODY>
<?php
	$myFile = fopen("data.txt", "r") or die("Не могу открыть файл");
	echo 'Файл успешно открыт для чтения'; echo "<br>";
	fclose($myFile);
	echo 'Файл закрыт';

	
?>
</BODY>
</HTML>