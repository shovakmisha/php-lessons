<HTML>
<HEAD>
<TITLE>crypt</TITLE>
</HEAD>
<BODY>
<?
	$password = "secret";

	if(CRYPT_MD5)
	{
		$salt = "leonatkinson";
		print("Using MD5: ");
	}
	else
	{
		$salt = "cp";
		print("Using Standard DES: ");
	}

	print(crypt($password, $salt));
?>
</BODY>
</HTML>