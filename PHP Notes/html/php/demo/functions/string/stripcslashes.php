<HTML>
<HEAD>
<TITLE>stripcslashes</TITLE>
</HEAD>
<BODY>
<?
	//create some test text
	$text = "Line 1\x0ALine 2\x0A";
	
	//convert backslashes to actual characters
	print(stripcslashes($text));
?>
</BODY>
</HTML>