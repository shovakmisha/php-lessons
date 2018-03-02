<HTML>
<HEAD>
<TITLE>array_splice</TITLE>
</HEAD>
<BODY>
<?
	function printElement($element)
	{
		print("$element<BR>\n");
	}


	//set up an array of color names
	$colors = array("red", "blue", "green", 
		"yellow", "orange", "purple");
	
	//remove green
	array_splice($colors, 2, 2);
	
	//insert "pink" after "blue"
	array_splice($colors, 2, 0, "pink");
	
	//insert "cyan" and "black" between
	//"orange" and "purple"
	array_splice($colors, 4, 0, array("cyan","black"));
	
	//print out all the values	
	array_walk($colors, "printElement");
?>
</BODY>
</HTML>