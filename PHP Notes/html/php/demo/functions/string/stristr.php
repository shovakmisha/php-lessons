<HTML>
<HEAD>
<TITLE>stristr</TITLE>
</HEAD>
<BODY>
<?
	$text = "Although he had help, Leon is the author of this book.";
	
	print("Full text: $text <BR>\n");
	print("Looking for 'leon':" . stristr($text, "leon")); 
?>
</BODY>
</HTML>