<HTML>
<HEAD>
<TITLE>array_pop</TITLE>
</HEAD>
<BODY>
<?
	//set up an array of color names
	$colors = array("red", "blue", "green");
	
	$lastColor = array_pop($colors);
	
	//prints "green"
	print($lastColor . "<BR>\n");
	
	//shows that colors contains red, blue
	print("<PRE>");
	print_r($colors);
	print("</PRE>\n");
?>
</BODY>
</HTML>