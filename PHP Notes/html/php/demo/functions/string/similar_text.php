<HTML>
<HEAD>
<TITLE>similar_text</TITLE>
</HEAD>
<BODY>
<?
	//create two strings
	$left = "Leon Atkinson";
	$right = "Vicky Atkinson";
	
	//test to see how similar they are
	$i = similar_text($left, $right, &$percent);
	
	//print results
	print($i . " shared characters<BR>\n");
	print($percent . "% similar<BR>\n");
?>
</BODY>
</HTML>