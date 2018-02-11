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
<head>
	<title><?php echo $myrow["title"]; ?></title>
	<meta name="description" content="<?php echo $myrow["meta_d"]; ?>">
	<meta name="keywords" content="<?php echo $myrow["meta_k"]; ?>">
	<meta charset="utf-8">
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
	
</head>
<body>

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
					printf("<p class='post_title'>%s</p><p class='post__adds'>Автор: %s</p><p class='post__adds'>Дата: %s</p><p>%s</p><p class='view'>Просмотров: %s</p>", $myrow["title"], $myrow["author"], $myrow["date"], $myrow["text"], $myrow["view"]);
				?>	
					
					<form action="vote_res.php" method="post" name="vv">
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
				<?php
				echo "<p class='post_comment'>Коментарии к этой заметке</p>";
					
					$result3 = mysql_query("SELECT * FROM comments WHERE post='$id'", $db);
					if(mysql_num_rows($result3) > 0){
						$myrow3 = mysql_fetch_array($result3);
							
						do{
							printf("<div class='post_div'><p class='post_comment_add'>Коментарии добавил(а): <strong>%s</strong> <br> Дата: <strong>%s</strong></p>
							<p>%s</p></div>", $myrow3["author"],$myrow3["date"],$myrow3["text"]);	
						}while( $myrow3 = mysql_fetch_array($result3) );
					}
					$result4 = mysql_query("SELECT img FROM comments_setting", $db);
					$myrow4 = mysql_fetch_array($result4);
				?>
				<p class='post_comment'>Добавить новый коментарий</p>
				<form action="comment.php" method="post" name="form_com">
					<p><label>Ваше имя: </label><br><input name="author" type="text" Size="31" maxlength="30"></p>
					<p><label>Текст коментария: <br> <textarea name="text"cols="25" rows="4"></textarea></label></p>
					<p>Введите сумму чисел с картинки</p>
					<p><img src="<?php echo $myrow4['img']; ?>" width="80" height="40"><input name="pr" type="text" size="5" maxlength="5"></p>
					<p><input name="sub_com" type="submit" value="Коментировать"></p>
					<input name="id" type="hidden" value="<?php echo $id; ?>">
				</form>
			</div>
		</div>
		<?php include("blocks/footer.php") ?>
	</div>

</body>
</html>
