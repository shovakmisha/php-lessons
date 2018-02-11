<HTML>
<HEAD>
<TITLE>is_object</TITLE>
</HEAD>
<BODY>
<?
	class widget
	{
		var $name;
		var $length;
	}
	
	$thing = new widget;

	if(is_object($thing))
	{
		print("thing is an object");
	}

?>
</BODY>
</HTML>