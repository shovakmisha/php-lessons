<HTML>
<HEAD>
<TITLE>parse_str</TITLE>
</HEAD>
<BODY>
<?
	$query = "name=Leon&occupation=Web+Engineer";
	parse_str($query);
	print("$name <BR>\n");
	print("$occupation <BR>\n");
?>
</BODY>
</HTML>