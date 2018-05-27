<HTML>
<HEAD>
<TITLE>extract</TITLE>
</HEAD>
<BODY>
<?
	$new_variables = array('Name'=>'Leon', 'Language'=>'PHP');

	$Language = 'English';

	extract($new_variables, EXTR_PREFIX_SAME, "collision");

	//print extracted variables
	print($Name . "<BR>\n");
	print($collision_Language . "<BR>\n");
	
?>
</BODY>
</HTML>