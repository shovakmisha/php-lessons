<HTML>
<HEAD>
<TITLE>bin2hex</TITLE>
</HEAD>
<BODY>
<?
	//print book title in hex
	//436f7265205048502050726f6772616d6d696e67
	$s = "Core PHP Programming";
	$s = bin2hex($s);
	print($s);
?>
</BODY>
</HTML>