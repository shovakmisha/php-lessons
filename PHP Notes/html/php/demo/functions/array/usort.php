<HTML>
<HEAD>
<TITLE>usort</TITLE>
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
	srand(time());
	for($i=0; $i<10; $i++)
	{
		$data[rand(1,100)] = rand(1,100);
	}

	//sort using custom compare
	usort($data, "compare");

	//show sorted array
	foreach($data as $key=>$value) 
	{
		print($key . "=" . $value . "<BR>\n");
	}
?>
</BODY>
</HTML>