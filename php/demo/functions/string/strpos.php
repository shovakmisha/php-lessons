<HTML>
<HEAD>
<TITLE>strpos</TITLE>
</HEAD>
<BODY>
<?
	$text = "Hello, World!";

	//check for a space
	if(strpos($text, 32))
	{
		print("There is a space in '$text'<BR>\n");
	}
	
	//find where in the string World appears
	print("World is at position " . strpos($text, "World") . "<BR>\n");
?>
</BODY>
</HTML>