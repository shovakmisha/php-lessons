<HTML>
<HEAD>
<TITLE>substr_replace</TITLE>
</HEAD>
<BODY>
<?
	$text = "My dog's name is Angus.";

	//replace Angus with Gus
	print(substr_replace($text, "Gus", 17, 5));
?>
</BODY>
</HTML>