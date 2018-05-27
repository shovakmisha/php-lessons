<HTML>
<HEAD>
<TITLE>strip_tags</TITLE>
</HEAD>
<BODY>
<?
	//create some test text
	$text = "<P><B>Paragraph One</B><P>Paragraph Two";
	
	//strip out all tags except paragraph and break
	print(strip_tags($text, "<P><BR>"));
?>
</BODY>
</HTML>