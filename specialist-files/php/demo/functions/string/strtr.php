<HTML>
<HEAD>
<TITLE>strtr</TITLE>
</HEAD>
<BODY>
<?
	/*
	** Using strtr with 3 arguments
	** to translate characters.
	*/
	$text = "Wow!  This is neat.";
	$original = "!.";
	$translated = ".?";

	// turn sincerity into sarcasm
	print(strtr($text, $original, $translated) . "<BR>\n");
?>
</BODY>
</HTML>