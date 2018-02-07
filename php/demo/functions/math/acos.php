<HTML>
<HEAD>
<TITLE>acos</TITLE>
</HEAD>
<BODY>
<?
	// print acos values from -1 to 1
	print("<TABLE BORDER=\"1\">\n");
	print("<TR><TH>x</TH><TH>acos(x)</TH></TR>\n");

	for($index = -1; $index <= 1; $index += 0.25)
	{
		print("<TR>\n");
		print("<TD>$index</TD>\n");
		print("<TD>" . acos($index) . "</TD>\n");
		print("</TR>\n");
	}

	print("</TABLE>\n");
?>
</BODY>
</HTML>