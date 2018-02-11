<?php 
	include("blocks/db.php");
	$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='secret'",$db);
	if(!$result){
		echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
		exit(mysql_error());
	}
	
	if(mysql_num_rows($result) > 0){
		$myrow = mysql_fetch_array($result);
	}else{
		echo "<p>Информация по запросу не может быть извлечена, в таблице нет таких записей</p>";
		exit();
	}
	if(isset( $_POST['code'] )){
		$code = $_POST['code'];
	}
?>
<!doctype html>

<html>
<head>
	<title><?php echo $myrow["title"]; ?></title>
	<meta name="description" content="<?php echo $myrow["meta_d"]; ?>">
	<meta name="keywords" content="<?php echo $myrow["meta_k"]; ?>">
	<meta charset="windows-1251">
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
					<?php echo $myrow["text"];
					
					$result0 = mysql_query("SELECT prcode FROM options",$db);
					if($result0){
						$myrow = mysql_fetch_array($result0);
						$prcode = $myrow["prcode"];
					}else{
						exit("<p>Не удалось получить код секретного раздела. Проверте наличие таблиц</p>");
					}
					
					
						echo "<form name='sec' action='secret.php' method='post'>
						<p align='center'><strong>Введите код подписчика</strong></p>
						<p align='center'><input class='sinput' type='text' name='code'></p>
						<p align='center'><input class='sbutton' type='submit' name='submit' value='Получить доступ'></p>
						</form>
						<p align='center'><img src='img/zam.jpg' width='120' height='136'></p>
						";
						if( !isset($code) or $code != $prcode ){
						$result = mysql_query("SELECT id,title,description,date,author,mini_img,view FROM data WHERE secret='1'",$db);
					if(!$result){
						echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
						exit(mysql_error());
					}
					
					if(mysql_num_rows($result) > 0){
							$myrow = mysql_fetch_array($result);
							
							do{
							printf("
								<div class='post__stati'>
									<div class='top__stati'>
										<p class='post_secret'><img class='mini' align='left' src='%s'><a href='#'>%s (Доступ закрыт)</a></p>
										<p class='post__adds'>Дата создания: %s</p>
										<p class='post__adds'>Автор урока: %s</p>
									</div>	
										<p>%s</p>
										<p class='view'>Просмотров: %s</p>
								</div>
								",  $myrow['mini_img'],
								// $myrow['id'], 
								$myrow['title'],$myrow['date'], $myrow['author'], $myrow['description'], $myrow['view']);
							}while( $myrow = mysql_fetch_array($result) );
						
						}else{
							echo "<p>Информация по запросу не может быть извлечена, в таблице нет таких записей</p>";
							exit();
						}
					}else{
						$result = mysql_query("SELECT id,title,description,date,author,mini_img,view FROM data WHERE secret='1'",$db);
						if(!$result){
							echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
							exit(mysql_error());
						}
						
						if(mysql_num_rows($result) > 0){
							$myrow = mysql_fetch_array($result);
							
							do{
							printf("
								<div class='post__stati'>
									<div class='top__stati'>
										<p class='post__title'><img class='mini' align='left' src='%s'><a href='view_post.php?id=%s'>%s</a></p>
										<p class='post__adds'>Дата создания: %s</p>
										<p class='post__adds'>Автор урока: %s</p>
									</div>	
										<p>%s</p>
										<p class='view'>Просмотров: %s</p>
								</div>
								",  $myrow['mini_img'],
								 $myrow['id'], 
								$myrow['title'],$myrow['date'], $myrow['author'], $myrow['description'], $myrow['view']);
							}while( $myrow = mysql_fetch_array($result) );
						
						}else{
							echo "<p>Информация по запросу не может быть извлечена, в таблице нет таких записей</p>";
							exit();
						}
					}
					?>
					
				</div>
			</div>
		<?php include("blocks/footer.php") ?>
	</div>

</body>
</html>
