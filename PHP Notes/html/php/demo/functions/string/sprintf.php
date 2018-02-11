<HTML>
<HEAD>
<TITLE>sprintf</TITLE>
</HEAD>
<BODY>
<?
	$x = 3.00;

	//print $x as PHP default
	print($x . "<BR>\n");
	
	//format value of $x so that
	//it show two decimals after
	//the decimal point
	$s = sprintf("%.2f", $x);
	print($s . "<BR>\n");
?>
</BODY>
</HTML>