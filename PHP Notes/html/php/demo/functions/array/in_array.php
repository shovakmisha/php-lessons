<HTML>
<HEAD>
<TITLE>in_array</TITLE>
</HEAD>
<BODY>
<?
	//create test data
	$colors = array("red", "green", "blue");

	//test for the presence of green
	if(in_array("green", $colors))
	{
		print("Yes, green is present!");
	}
?>
</BODY>
</HTML>