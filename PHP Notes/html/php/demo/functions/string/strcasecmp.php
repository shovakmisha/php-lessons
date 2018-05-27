<HTML>
<HEAD>
<TITLE>strcasecmp</TITLE>
</HEAD>
<BODY>
<?
	$first = "abc";
	$second = "aBc";

	if(strcasecmp($first, $second) == 0)
	{
		print("strings are equal");
	}
	else
	{
		print("strings are not equal");
	}
?>
</BODY>
</HTML>