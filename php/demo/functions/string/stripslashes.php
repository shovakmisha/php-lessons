<HTML>
<HEAD>
<TITLE>stripslashes</TITLE>
</HEAD>
<BODY>
<?
	$text = "Leon\'s Test String";
	
	print("Before: $text<BR>\n");
	print("After: " . stripslashes($text) . "<BR>\n");
?>
</BODY>
</HTML>