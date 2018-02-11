<HTML>
<HEAD>
<TITLE>addslashes</TITLE>
</HEAD>
<BODY>
<?
	// add slashes to text
	$phrase = addslashes("I don't know");

	// build query
	$Query = "SELECT * ";
	$Query .= "FROM comment ";
	$Query .= "WHERE text like '%$phrase%'";

	print($Query);
?>
</BODY>
</HTML>