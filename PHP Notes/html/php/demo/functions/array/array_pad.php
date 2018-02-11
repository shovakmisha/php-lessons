<HTML>
<HEAD>
<TITLE>array_pad</TITLE>
</HEAD>
<BODY>
<?
	//create test data
	$data = array(1,2,3);
	
	//add "start" to beginning of array
	$data = array_pad($data, -4, "start");

	//add "end" to end of array
	$data = array_pad($data, 5, "end");
	
	foreach($data as $value)
	{
		print("$value<BR>\n");
	}
?>
</BODY>
</HTML>