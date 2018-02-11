<HTML>
<HEAD>
<TITLE>sort</TITLE>
</HEAD>
<BODY>
<?
	//create test data
	$colors = array("one"=>"orange", "two"=>"cyan", "three"=>"purple");

	//sort and discard keys
	sort($colors);
	
	//show array
	foreach($colors as $key=>$value)
	{
		print("$key = $value<BR>\n");
	}
?>
</BODY>
</HTML>