<HTML>
<HEAD>
<TITLE>krsort</TITLE>
</HEAD>
<BODY>
<?
	$colors = array("red"=>"FF0000",
		"green"=>"00FF00", 
		"blue"=>"0000FF");

	// sort an array by its keys
	krsort($colors);
	
	// print out the values
	foreach($colors as $key=>$value)
	{
		print("$key : $value <BR>\n");
	}
?>
</BODY>
</HTML>