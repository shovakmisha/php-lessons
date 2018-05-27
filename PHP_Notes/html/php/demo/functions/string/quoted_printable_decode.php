<HTML>
<HEAD>
<TITLE>quoted_printable_decode</TITLE>
</HEAD>
<BODY>
<?
	$command = "echo 'hello\?'";
	print(quoted_printable_decode($command));
?>
</BODY>
</HTML>