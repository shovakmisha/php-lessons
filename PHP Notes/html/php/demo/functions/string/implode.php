<HTML>
<HEAD>
<TITLE>implode</TITLE>
</HEAD>
<BODY>
<?
	/*
	** convert an array into a comma-delimited string
	*/
	$colors = array("red", "green", "blue");
	$colors = implode($colors, ",");
	
	print($colors);
?>
</BODY>
</HTML>