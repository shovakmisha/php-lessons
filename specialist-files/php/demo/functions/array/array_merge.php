<HTML>
<HEAD>
<TITLE>array_merge</TITLE>
</HEAD>
<BODY>
<?
	function printElement($element)
	{
		print("$element<BR>\n");
	}

	//set up an array of color names
	$colors = array("red", "blue", "green");
	$more_colors = array("yellow", "purple", "orange");
	
	//merge arrays
	$all_colors = array_merge($colors, $more_colors);
		
	//print out all the values	
	array_walk($all_colors, "printElement");
?>
</BODY>
</HTML>