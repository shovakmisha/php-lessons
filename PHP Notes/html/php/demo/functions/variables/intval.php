<HTML>
<HEAD>
<TITLE>intval</TITLE>
</HEAD>
<BODY>
<?
	//drop extraneous stuff after decimal point
	print(intval("13.5cm") . "<BR>\n");
	
	//convert from hex
	print(intval("EE", 16));
?>
</BODY>
</HTML>