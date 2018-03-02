<HTML>
<HEAD>
<TITLE>asin</TITLE>
</HEAD>
<BODY>
<?
	// print asin values from -1 to 1
	print("<TABLE BORDER=\"1\">\n");
	print("<TR><TH>x</TH><TH>asin(x)</TH></TR>\n");

	for($index = -1; $index <= 1; $index += 0.25)
	{
		print("<TR>\n");
		print("<TD>$index</TD>\n");
		print("<TD>" . asin($index) . "</TD>\n");
		print("</TR>\n");
	}

	print("</TABLE>\n");
?>
</BODY>
</HTML>