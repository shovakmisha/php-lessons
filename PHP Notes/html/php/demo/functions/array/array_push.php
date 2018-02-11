<HTML>
<HEAD>
<TITLE>array_push</TITLE>
</HEAD>
<BODY>
<?
	//set up an array of color names
	$colors = array("red", "blue", "green");
	
	//push two more color names
	array_push($colors, "purple", "yellow");
	
	//print out all the values
	//(red, blue, green, purple, yellow)
	print("<PRE>");
	print_r($colors);
	print("</PRE>\n");
?>
</BODY>
</HTML>