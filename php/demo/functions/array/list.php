<HTML>
<HEAD>
<TITLE>list</TITLE>
</HEAD>
<BODY>
<?
	$colors = array("red", "green", "blue");

	//put first two elements of returned array
	//into key and value, respectively
	list($key, $value) = each($colors);

	print("$key: $value<BR>\n");
?>
</BODY>
</HTML>