<HTML>
<HEAD>
<TITLE>asort</TITLE>
</HEAD>
<BODY>
<?
	// build array
	$users = array("bob"=>"Robert",  
		"steve"=>"Stephen", 
		"jon"=>"Jonathon");

	// sort array
	asort($users);

	// print out the values
	for(reset($users); $index=key($users); next($users))
	{
		print("$index : $users[$index] <BR>\n");
	}
?>
</BODY>
</HTML>