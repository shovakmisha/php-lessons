<HTML>
<HEAD>
<TITLE>array_values</TITLE>
</HEAD>
<BODY>
<?
	//set up an array of color names
	$UserInfo = array("First Name"=>"Leon",
		"Last Name"=>"Atkinson",
		"Favorite Language"=>"PHP");
	
	//re-index using integers
	$UserInfo = array_values($UserInfo);
	
	//print out all the values	
	for($n=0; $n < count($UserInfo); $n++)
	{
		print("($n) $UserInfo[$n]<BR>\n");
	}

?>
</BODY>
</HTML>