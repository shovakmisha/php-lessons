<HTML>
<HEAD>
<TITLE>str_replace</TITLE>
</HEAD>
<BODY>
<?
	$text = "Search results with keywords highlighted.";
	print(str_replace("keywords", "<B>keywords</B>", $text));
?>
</BODY>
</HTML>