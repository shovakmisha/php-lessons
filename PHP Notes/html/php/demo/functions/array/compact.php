<HTML>
<HEAD>
<TITLE>compact</TITLE>
</HEAD>
<BODY>
<?
	//create some variables
	$name = "Leon";
	$language = "PHP";
	$color = "blue";
	$city = "Martinez";
	
	//get variables as array
	$variable = compact("name", 
		array("city", array("language", "color")));
	
	//print out all the values
	print("<PRE>");
	print_r($variable);
	print("</PRE>\n");
?>
</BODY>
</HTML>