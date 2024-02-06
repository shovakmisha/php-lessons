<HTML>
<HEAD>
<TITLE>uasort</TITLE>
</HEAD>
<BODY>
<?
	/*
	** duplicate normal ordering
	*/
	function compare($left, $right) 
	{
		return($left - $right);
	}

	//create test data
	$some_numbers = array(
		"red"=>6,
		"green"=>4,
		"blue"=>8,
		"yellow"=>2,
		"orange"=>7,
		"cyan"=>1,
		"purple"=>9,
		"magenta"=>3,		
		"black"=>5);

	//sort using custom compare
	uasort($some_numbers, "compare");

	//show sorted array
	foreach($some_numbers as $key=>$value) 
	{
		print($key . "=" . $value . "<BR>\n");
	}
?>
</BODY>
</HTML>