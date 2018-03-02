<HTML>
<HEAD>
<TITLE>prev</TITLE>
</HEAD>
<BODY>
<?
	$colors = array("red", "green", "blue");
	end($colors);
	$my_color = current($colors);
	do
	{
		print("$my_color <BR>\n");
	}
	while($my_color = prev($colors))
?>
</BODY>
</HTML>