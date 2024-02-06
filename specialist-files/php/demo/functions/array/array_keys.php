<HTML>
<HEAD>
<TITLE>array_keys</TITLE>
</HEAD>
<BODY>
<?
	//create random test data with 0 or 1
	srand(time());
	for($i=0; $i<10; $i++)
	{
		$data[] = rand(0,1);
	}

	//print out the keys to 1's
	foreach(array_keys($data, 1) as $key)
	{
		print("$key<BR>\n");
	}
?>
</BODY>
</HTML>