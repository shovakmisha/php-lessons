<HTML>
<HEAD>
<TITLE>count_chars</TITLE>
</HEAD>
<BODY>
<?
	//print counts for characters found
	foreach(count_chars("Core PHP", 1) as $key=>$value)
	{
		print("$key: $value<BR>\n");
	}

	//print list of characters found
	print("Characters: '" . count_chars("Core PHP", 3) . "'<BR>\n");
?>
</BODY>
</HTML>
