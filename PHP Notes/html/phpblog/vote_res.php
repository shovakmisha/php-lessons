<?php
	include("blocks/db.php");

	if( isset( $_POST['score'] ) ){
		$score = $_POST['score'];
	}
	if( isset( $_POST['id'] ) ){
		$id = $_POST['id'];
	}
	
	$result = mysql_query("SELECT rating,q_vote FROM data WHERE id='$id' ",$db);
	if(!$result){
		echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
		exit(mysql_error());
	}
	
	if(mysql_num_rows($result) > 0){
		$myrow = mysql_fetch_array($result);
		
		$new_rating = $myrow['rating'] + $score;
		$new_q_vote = $myrow['q_vote'] + 1;
		$update = mysql_query("UPDATE data SET rating='$new_rating', q_vote='$new_q_vote' WHERE id='$id' ",$db);
		if($update){
			echo "<html><head>
			<meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'>
			</head></html>";
			exit();
		}
		
	}else{
		echo "<p>Информация по запросу не может быть извлечена, в таблице нет таких записей</p>";
		exit();
	}
?>