<HTML>
<HEAD>
<TITLE>strrpos</TITLE>
</HEAD>
<BODY>
<?
	//set test string
	$path = "/usr/local/apache";
	
	//find last slash
	$pos = strrpos($path, "/");
	
	//print everything after the last slash
	print(substr($path, $pos+1));
?>
</BODY>
</HTML>