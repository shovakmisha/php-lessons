<HTML>
<HEAD>
<TITLE>strstr</TITLE>
</HEAD>
<BODY>
<?
	$text = "Although this is a string, it's not very long.";
	if(strstr($text, "it") != "")
	{
		print("The string contains 'it'.<BR>/n");
	}
?>
</BODY>
</HTML>