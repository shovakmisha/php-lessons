<HTML>
<HEAD>
<TITLE>print_r</TITLE>
</HEAD>
<BODY>
<PRE>
<?
	//define some test variables
	$s = "a string";
	$a = array("x", "y", "z", array(1, 2, 3));

	//print a string
	print_r($s);
	print("\n");

	//print an array
	print_r($a);
	print("\n");
?>
</PRE>
</BODY>
</HTML>