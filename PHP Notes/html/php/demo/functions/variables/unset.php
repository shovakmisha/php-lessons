<HTML>
<HEAD>
<TITLE>unset</TITLE>
</HEAD>
<BODY>
<?
	$list[0] = "milk";
	$list[1] = "eggs";
	$list[2] = "sugar";

	unset($list);

	if(!isset($list))
	{
		print("list has been cleared and has ");
		print(count($list));
		print(" elements");
	}
?>
</BODY>
</HTML>