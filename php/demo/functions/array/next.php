<HTML>
<HEAD>
<TITLE>next</TITLE>
</HEAD>
<BODY>
<?
	$colors = array("red", "green", "blue");
	$my_color = current($colors);
	do
	{
		print("$my_color <BR>\n");
	}
	while($my_color = next($colors))
?>
</BODY>
</HTML>