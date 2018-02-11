<HTML>
<HEAD>
<TITLE>explode</TITLE>
</HEAD>
<BODY>
<?
	/* 
	** convert tab-delimited list into an array
	*/
	$data = "red\tgreen\tblue";
	$colors = explode("\t", $data);

	// print out the values
	for($index=0; $index < count($colors); $index++)
	{
		print("$index : $colors[$index] <BR>\n");
	}
?>
</BODY>
</HTML>