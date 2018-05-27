<HTML>
<HEAD>
<TITLE>ord</TITLE>
</HEAD>
<BODY>
<?
	/*
	** Decompose a string into its ASCII codes.
	** Test for codes below 32 because these have
	** special meaning and we may not want to
	** print them.
	*/
	
	$text = "Line 1\nLine 2\n";

	print("ASCII Codes for '$text'<BR>\n");

	print("<TABLE>\n");
	
	for($i=0; $i < strlen($text); $i++)
	{
		print("<TR>");
	
		print("<TH>");
		if(ord($text[$i]) > 31)
		{
			print($text[$i]);
		}
		else
		{
			print("(unprintable)");
		}
		print("</TH> ");

		print("<TD>");
		print(ord($text[$i]));
		print("</TD>");

		print("</TR>\n");
	}

	print("</TABLE>\n");
?>
</BODY>
</HTML>