<HTML>
<HEAD>
<TITLE>array_reverse</TITLE>
</HEAD>
<BODY>
<?
	//create test data
	$data = array(3, 1, 2, 7, 5);
	
	//reverse order
	$data = array_reverse($data);
	
	//print in reverse order
	//5, 7, 2, 1, 3
	print("<PRE>");
	print_r($data);
	print("</PRE>\n");
?>
</BODY>
</HTML>