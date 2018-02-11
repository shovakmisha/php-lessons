<HTML>
<HEAD>
<TITLE>current</TITLE>
</HEAD>
<BODY>
<?
	//create test data
	$colors = array("red", "green", "blue");
	
	//loop through array using current
	for(reset($colors); $value = current($colors); next($colors))
	{
		print("$value<BR>\n");
	}
?>
</BODY>
</HTML>