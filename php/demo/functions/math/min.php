<HTML>
<HEAD>
<TITLE>min</TITLE>
</HEAD>
<BODY>
<?
	$colors = array("red"=>"FF0000",
		"green"=>"00FF00", 
		"blue"=>"0000FF");

	//prints 0000FF
	print(min($colors) . "<BR>\n");
	
	//prints 13
	print(min("hello", "55", 13) . "<BR>\n");
	
	//prints 1
	print(min(1, 17, 3, 5.5) . "<BR>\n");
?>
</BODY>
</HTML>