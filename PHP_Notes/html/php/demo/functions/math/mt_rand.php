<HTML>
<HEAD>
<TITLE>mt_rand</TITLE>
</HEAD>
<BODY>
<?
	//seed the generator
	mt_srand(time());

	//get ten random numbers from 1 to 100 
	for($index = 0; $index < 10; $index++)
	{
		print(mt_rand(1, 100) . "<BR>\n");
	}
?>
</BODY>
</HTML>