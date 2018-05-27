<HTML>
<HEAD>
<TITLE>rand</TITLE>
</HEAD>
<BODY>
<?
	srand(time());

	//get ten random numbers from -100 to 100 
	for($index = 0; $index < 10; $index++)
	{
		print(rand(-100, 100) . "<BR>\n");
	}
?>
</BODY>
</HTML>