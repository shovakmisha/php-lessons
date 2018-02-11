
<div class='menu col-lg-2 col-md-3 col-sm-3 col-xs-5'>
	<div class='nav_title'>
		<span>категории</span>
	</div>
	<?php
		$result2 = mysql_query("SELECT * FROM categories",$db);
		if(!$result2){
			echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
			exit(mysql_error());
		}
		
		if(mysql_num_rows($result2) > 0){
			$myrow2 = mysql_fetch_array($result2);
			
			do{
				printf("<p class ='left_links point'><img src='img/arr.jpg' height='10' width='10'><a class='nav_link' href='view_cat.php?cat=%s'>%s</a></p>",$myrow2["id"],$myrow2["title"]);
			}while($myrow2 = mysql_fetch_array($result2));
		}else{
			echo "<p>Информация по запросу не может быть извлечена, в таблице нет таких записей</p>";
			exit();
		}
	?>
	<div class='nav_title'>
		<span>Последние заметки</span>
	</div>
	<?php
		$result3 = mysql_query("SELECT id,title FROM data WHERE secret='0' ORDER BY id DESC LIMIT 5",$db);
		
		if(!$result3){
			echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
			exit(mysql_error());
		}
		if(mysql_num_rows($result3) > 0){
			$myrow3 = mysql_fetch_array($result3);
			do{
				printf("<p class ='left_links point'><img src='img/arr2.jpg' height='10' width='10'><a class='nav_link' href='view_post.php?id=%s'>%s</a></p>", $myrow3["id"], $myrow3["title"]);
			}while($myrow3 = mysql_fetch_array($result3));
		}else{
			echo "<p>Информация по запросу не может быть извлечена, в таблице нет таких записей</p>";
			exit();	
		}
	?>
	<div class='nav_title'>
		<span>Архив</span>
	</div>
		<?php
		$result4 = mysql_query("SELECT DISTINCT left(date,7) AS month FROM data ORDER BY month DESC",$db);
		
		if(!$result4){
			echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
			exit(mysql_error());
		}
		if(mysql_num_rows($result4) > 0){
			$myrow4 = mysql_fetch_array($result4);
			do{
				printf("<p class ='left_links point'><img src='img/arr3.jpg' height='10' width='10'><a class='nav_link' href='view_date.php?date=%s'>%s</a></p>", $myrow4["month"], $myrow4["month"]);
			}while($myrow4 = mysql_fetch_array($result4));
		}else{
			echo "<p>Информация по запросу не может быть извлечена, в таблице нет таких записей</p>";
			exit();	
		}
	?>
	<div class='nav_title'>
		<span>Рекомендую</span>
	</div>
	<?php
		$result5 = mysql_query("SELECT link,name FROM friends",$db);
		
		if(!$result5){
			echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
			exit(mysql_error());
		}
		if(mysql_num_rows($result5) > 0){
			$myrow5 = mysql_fetch_array($result5);
			do{
				printf("<p class ='left_links point'><img src='img/arr4.jpg' height='10' width='10'><a class='nav_link' href='%s'>%s</a></p>", $myrow5["link"], $myrow5["name"]);
			}while($myrow5 = mysql_fetch_array($result5));
		}else{
			echo "<p>Информация по запросу не может быть извлечена, в таблице нет таких записей</p>";
			exit();	
		}
	?>
	<div class='nav_title'>
		<span>Поиск</span>
	</div>
	<form action='view_search.php' name='form_s' method='post'>
		<p class='search_t'>Поисковый запрос должен иметь не менее 4-х символов</p>
		<p><input name='search' type='text' size='20' maxlength='40'><br>
		<input name='submit_s' type='submit' value='Искать' class='search_b'>
		</p>
	</form>
	<p><a href='secret.php'>Секретный раздел</a></p>
	<div class='nav_title'>
	
	
	
		<span>Статистика</span>
	</div>
	
	<?php
		$result10 = mysql_query("SELECT COUNT(*) FROM data",$db);
		$sum = mysql_fetch_array($result10);
		
		$result10 = mysql_query("SELECT COUNT(*) FROM data",$db);
		$sum = mysql_fetch_array($result10);
		
		function online () {
			$ip=getenv("HTTP_X_FORWARDED_FOR");
			if (empty($ip) || $ip=='unknown') { $ip=getenv("REMOTE_ADDR"); }
			# уд. старые сессии
			mysql_query ("DELETE FROM online WHERE UNIX_TIMESTAMP() - UNIX_TIMESTAMP(time) > 300") or die ("Can't delete old sess");

			# проверка на присутстаие или занесение нового пользователя
			$select = mysql_query ("SELECT ip FROM online WHERE ip='$ip'") or die ("Can't select duble");
			$tmp = mysql_fetch_row ($select);
			if ($ip == $tmp[0]) {
			mysql_query ("UPDATE online SET time=NOW() WHERE ip='$ip'") or die ("Can't update");
			} else {
			mysql_query ("INSERT INTO online (ip,time) VALUES ('$ip',NOW())") or die ("Can't insert");
			}
			# считывание результатов
			$select = mysql_query ("SELECT COUNT(*) FROM online") or die ("Can't select result");
			$tmp = mysql_fetch_row ($select);
			$result = $tmp[0];

			return $result;
		}
		
		echo "<p class='comments'>Заметок в базе: $sum[0]<br> Коментариев: $sum[0]<br>Человек на сайте: ".online()."</p>";
	?>
	<p><a href='gb.php'>Гостевая</a></p>
	
	<div class='nav_title'>
		<span>Опрос</span>
	</div>
	<?php

	/* path */
	$poll_path = dirname(__FILE__);

	require_once "poll/include/config.inc.php";
	require_once "poll/include/$POLLDB[class]";
	require_once "poll/include/class_poll.php";
	$CLASS["db"] = new polldb_sql;
	$CLASS["db"]->connect();

	$php_poll = new poll();

	/* the first poll */
	echo $php_poll->poll_process(1);


	/* the second poll 
	$php_poll->set_template_set("simple");
	$php_poll->set_max_bar_length(80);
	echo $php_poll->poll_process(2);


	the third poll 
	$php_poll->set_template_set("popup");
	if ($php_poll->is_valid_poll_id(3)) {
		echo $php_poll->display_poll(3);
	}*/

?>

</div>