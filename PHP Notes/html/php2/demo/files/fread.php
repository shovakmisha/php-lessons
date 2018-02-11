<HTML>
<HEAD>
<TITLE>fread</TITLE>
</HEAD>
<BODY>
<?php
	$myFile = fopen("data.txt", "r") or die("Не могу открыть файл");
	//echo filesize("data.txt");
	echo fread($myFile, filesize("data.txt") );
	//echo fread($myFile, 3);
	//echo fread($myFile, 1024);
	fclose($myFile);
	
		
?>
</BODY>
</HTML>