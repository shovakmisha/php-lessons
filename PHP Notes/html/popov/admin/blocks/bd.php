<?php
$db = mysql_connect ("localhost","qaymbzho_p","12345");
mysql_select_db("qaymbzho_p",$db);
mysql_query("SET NAMES cp1251");
	mysql_query("SET CHARACTER SET cp1251");
	mysql_query("SET character_set_client = cp1251");
	mysql_query("SET character_set_connection = cp1251");
	mysql_query("SET character_set_results = cp1251");
?>