<HTML>
<HEAD>
<TITLE>array_slice</TITLE>
</HEAD>
<BODY>
<?
	function printElement($element)
	{
		print("$element<BR>\n");
	}

	//set up an array of color names
	$colors = array("red", "blue", "green", 
		"purple", "cyan", "yellow");

	//get a new array consisting of a slice
	//from "green" to "cyan"
	$colors_slice = array_slice($colors, 2, 3);	

	//print out all the values	
	array_walk($colors_slice, "printElement");
?>
</BODY>
</HTML>