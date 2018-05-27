<HTML>
<HEAD>
<TITLE>max</TITLE>
</HEAD>
<BODY>
<?
	$colors = array("red"=>"FF0000",
		"green"=>"00FF00", 
		"blue"=>"0000FF");

	//prints FF0000
	print(max($colors) . "<BR>\n");
	
	//prints 13
	print(max("hello", "55", 13) . "<BR>\n");
	
	//prints 17
	print(max(1, 17, 3, 5.5) . "<BR>\n");
?>
</BODY>
</HTML>