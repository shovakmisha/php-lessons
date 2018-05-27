<HTML>
<HEAD>
<TITLE>get_html_translation_table</TITLE>
</HEAD>
<BODY>
<?
	$trans = get_html_translation_table(HTML_ENTITIES);
	
	print("<pre>");
	var_dump($trans);
	print("</pre>\n");
?>
</BODY>
</HTML>