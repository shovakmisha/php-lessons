<HTML>
<HEAD>
<TITLE>key</TITLE>
</HEAD>
<BODY>
<?
	$colors = array("FF0000"=>"red", 
		"00FF00"=>"green", 
		"0000FF"=>"blue");

	for(reset($colors); $key = key($colors); next($colors))
	{
		print("$key is $colors[$key]<BR>\n");
	}
?>
</BODY>
</HTML>