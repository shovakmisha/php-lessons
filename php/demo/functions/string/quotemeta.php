<HTML>
<HEAD>
<TITLE>quotemeta</TITLE>
</HEAD>
<BODY>
<?
	//simulate user input
	$input = '$password';
	
	//assemble safe PHP command
	$cmd = '$text = "' . quotemeta($input) . '";';

	//execute command
	eval($cmd);
	
	//print new value of $text
	print($text);
?>
</BODY>
</HTML>