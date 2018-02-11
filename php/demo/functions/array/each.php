<HTML>
<HEAD>
<TITLE>each</TITLE>
</HEAD>
<BODY>
<?
	//create test data
	$colors = array("red", "green", "blue");
	
	//loop through array using each
	//output will be like "0 = red"
	while(list($key, $value) = each($colors))
	{
		print("$key = $value<BR>\n");
	}
?>
</BODY>
</HTML>