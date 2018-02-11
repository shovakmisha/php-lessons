<?php 
	include("blocks/db.php");
	if( isset( $_GET['id'] ) ){
		$id = $_GET['id'];
	}
	if( !isset( $_GET['id'] ) ){
		$id = 1;
	}
	
	if(!preg_match("|^[\d]+$|", $id)){
		exit("<p>Неверный формат запроса! Проверьте URL!</p>");
	}
	
	$result = mysql_query("SELECT * from data WHERE id='$id'",$db);
	if(!$result){
		echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
		exit(mysql_error());
	}
	
	if(mysql_num_rows($result) > 0){
		$myrow = mysql_fetch_array($result);
		$new_view = $myrow["view"] + 1;
		mysql_query("UPDATE data SET view='$new_view' WHERE id='$id'",$db);
	}else{
		echo "<p>Информация по запросу не может быть извлечена, в таблице нет таких записей</p>";
		exit();
	}
	
?>
<!doctype html>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<title><?php echo $myrow["title"]; ?></title>
	<meta name="description" content="<?php echo $myrow["meta_d"]; ?>">
	<meta name="keywords" content="<?php echo $myrow["meta_k"]; ?>">
	
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	
	<link rel="stylesheet" href="css/md-1200.css">
	<link rel="stylesheet" href="css/sm-992.css">
	<link rel="stylesheet" href="css/xs-768.css">
	<link rel="stylesheet" href="css/media-480.css">	
	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/custom.js" type="text/javascript"></script>
	
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
</head>
<body>
<?php
 	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$secret = '6Lc2iSATAAAAAEQZ_77t7v3z4SUPzyyHYm9poXm_';
		$recaptcha = $_POST['g-recaptcha-response'];
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$url_data = $url.'?secret='.$secret.'&response='.$recaptcha.'&remoteip='.$ip;
		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url_data);
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		$res = curl_exec($curl);
		curl_close($curl);
		$res = json_decode($res);
		
		if($res -> success){	
			if( isset( $_POST['author'] ) ){
				$author = $_POST['author'];
			}
			if( isset( $_POST['text'] ) ){
				$text = $_POST['text'];
			}
			if( isset( $_POST['sub_com'] ) ){
				$sub_com = $_POST['sub_com'];
			}
			if( isset( $_POST['id'] ) ){
				$id = $_POST['id'];
			}
			
			$result3 = mysql_query("SELECT email FROM contacts", $db);
			$myrow3 = mysql_fetch_array($result3);
			
			$address = $myrow3['email'];
			
			
			$subject = "Новый коментарий в блоге";
			$result3 = mysql_query("SELECT title FROM data WHERE id='$id'",$db);
			$myrow3 = mysql_fetch_array($result3);
			$post_title = $myrow3["title"];
			
			$message = "Появился коментарий к заметке - ".$post_title."\n Коментарий добавил(а): ".$author."\n Текст коментария: ".$text."\n Ссылка на заметку: http://shovak.shn-host.ru/popov/view_post.php?id=".$id;
			mail($address,$subject,$message, "Content-type:text/plain; Charset=windows-1251\r\n");
			
			$date = date("Y-m-d");
			$result7 = mysql_query("INSERT INTO comments (post,author,text,date) VALUES ('$id','$author', '$text', '$date')",$db);
		
			echo "<div class='comm'></div>";
		}
	
		
	}
?>
	<div class='container'>
		<?php include("blocks/header.php") ?>
		<div class='row'>
			<?php include("blocks/left.php") ?>
			<div class='content col-lg-10 col-md-9 col-sm-9 col-xs-12'>
				<?php include("blocks/nav.php") ?>
				<div class="ik">
					<img src='img/ik.png'>
				</div>
				<?php 
					printf("<p class='post_title'>%s</p><p>%s</p><p class='post__adds'>Автор: %s</p><p class='post__adds'>Дата: %s</p><p class='view'>Просмотров: %s</p>", $myrow["title"], $myrow["text"], $myrow["author"], $myrow["date"], $myrow["view"]);
				?>	
					
					<form action="vote_res.php" method="POST" name="vv" class='octenka'>
						<div class='pvote'><span>Оцените заметку:</span>
							<label> 1 <input name='score' type='radio' value='1'></label>
							<label> 2 <input name='score' type='radio' value='2'></label>
							<label> 3 <input name='score' type='radio' value='3'></label>
							<label> 4 <input name='score' type='radio' value='4'></label>
							<label> 5 <input name='score' type='radio' value='5' checked></label>
							<input class='sub_vote' name='submit' type='submit' value='Оценить'>
							<span><input type='hidden' name='id' value='<?php echo "$id" ?>'></span>				
						</div>
					</form>
				<div class='comments col-lg-6 col-md-6 col-sm-5 col-xs-12'>
					<?php
						echo "<p class='post_comment'>Коментарии к этой заметке</p>";
						
						$result3 = mysql_query("SELECT * FROM comments WHERE post='$id'", $db);
						if(mysql_num_rows($result3) > 0){
							$myrow3 = mysql_fetch_array($result3);
								
							do{
								printf("<div class='post_div'><p class='post_comment_add'>Коментарии добавил(а): <strong>%s</strong> <br> Дата: <strong>%s</strong></p>
								<p>%s</p></div>", $myrow3["author"],$myrow3["date"],$myrow3["text"]);	
							}while( $myrow3 = mysql_fetch_array($result3) );
						}else{
							echo "<p>Коментариев к этой заметке нет</p>";
						}

					?>
				</div>
				<button class="btn btn-info btn-lg" type="button" data-toggle="modal" data-target="#myModal">Показать всплывающее окно</button > 
				<div id="myModal" class="modal fade">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header"><button class="close" type="button" data-dismiss="modal">X</button>
				<h4 class="modal-title">Заголовок окна</h4>
				</div>
				<div class="modal-body">Текст уведомления</div>
				<div class="modal-footer"><button class="btn btn-default" type="button" data-dismiss="modal">Закрыть</button></div>
				</div>
				</div>
				</div>
				
				<div class='add_comment col-lg-6 col-md-6 col-sm-7 col-xs-12'>
					<p class='post_comment'>Добавить новый коментарий</p>
					<form action="" method="POST" name="form_com">
						<p><label>Ваше имя: <br><input name="author" type="text" Size="39" maxlength="30"></label></p>
						<p><label>Текст коментария: <br> <textarea name="text"cols="37" rows="4" id='area'></textarea></label></p>
						<div><span>Подтвердите, что вы не робот</span><br>
							<div class="g-recaptcha" data-sitekey="6Lc2iSATAAAAADZN5AC0dvUXnbZ09qzhR0dQY0NP"></div>
						</div>	
						<input name="id" type="hidden" value="<?php echo $id; ?>">
						<p class='plus_comment'><input onclick='return checkComments()' name="sub_com" type="submit" value="Коментировать"></p>
					</form>
				</div>
			</div>
		</div>
		<?php include("blocks/footer.php") ?>
	</div>

</body>
</html>
