<HTML>
<HEAD>
<TITLE>chr</TITLE>
</HEAD>
<BODY>
<?
	//open a test file
	$fp = fopen("data.txt", "w");
	
	//write a couple of records that have
	//linefeeds for end markers
	fwrite($fp, "data record 1" . chr(10));
	fwrite($fp, "data record 2" . chr(10));
	
	//close file
	fclose($fp);
?>
</BODY>
</HTML>