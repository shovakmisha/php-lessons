<HTML>
<HEAD>
<TITLE>shuffle</TITLE>
</HEAD>
<BODY>
<?
	//create test data
	$numbers = range(1, 10);

	//rearrange
	shuffle($numbers);

	//print out all the values
	foreach($numbers as $value)
	{
		print("$value<BR>\n");
	}
?>
</BODY>
</HTML>