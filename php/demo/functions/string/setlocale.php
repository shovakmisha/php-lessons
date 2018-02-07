<HTML>
<HEAD>
<TITLE>setlocale</TITLE>
</HEAD>
<BODY>
<?
	// change locale in Windows NT 
	print("Changing to Russian: ");
	print(setlocale(LC_ALL, "russian"));
	print("<BR>\n");
	print("Dos vedanya!");
?>
</BODY>
</HTML>