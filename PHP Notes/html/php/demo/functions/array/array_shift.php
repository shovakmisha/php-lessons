<HTML>
<HEAD>
<TITLE>array_shift</TITLE>
</HEAD>
<BODY>
<?
	//set up an array of color names
	$colors = array("red", "blue", "green");
	
	$firstColor = array_shift($colors);
	
	//print "red"
	print($firstColor . "<BR>\n");

	//dump colors (blue, green)
	print("<PRE>");
	print_r($colors);
	print("</PRE>\n");
?>
</BODY>
</HTML>