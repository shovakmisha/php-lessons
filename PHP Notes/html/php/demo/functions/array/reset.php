<HTML>
<HEAD>
<TITLE>reset</TITLE>
</HEAD>
<BODY>
<?
	//create test data
	$colors = array("red", "green", "blue");

	//move internal pointer
	next($colors);

	//set internal pointer to first element
	reset($colors);

	//show which element we're at (red)
	print(current($colors));
?>
</BODY>
</HTML>