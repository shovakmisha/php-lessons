<HTML>
<HEAD>
<TITLE>array_walk</TITLE>
</HEAD>
<BODY>
<?
	$colors = array("red", "blue", "green");

	function printElement($element)
	{
		print("$element<BR>\n");
	}

	array_walk($colors, "printElement");
?>
</BODY>
</HTML>