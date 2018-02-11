<?php 
	include("blocks/db.php");
	
	if( isset( $_GET['date'] ) ){
		$date = $_GET['date'];
	}else{
		exit("<p>Вы обратились к файлу без необходимых параметров. В адресной строке неверный адрес</p>");
	}
	$date_tittle = $date;
	$begin_date = $date;
	$date++;
	$end_date = $date;
	$begin_date = $begin_date."-01";
	$end_date = $end_date."-01";
?>
<!doctype html>

<html>
<head>
	<title><?php echo 'Заметки за: '.$date_tittle; ?></title>
	<meta charset="windows-1251">
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
				
					$result = mysql_query("SELECT id,title,date,description,author,mini_img,view,rating,q_vote FROM data WHERE secret='0' AND date > '$begin_date' AND date < '$end_date' ",$db);
					if(!$result){
						echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
						exit(mysql_error());
					}
					
					if(mysql_num_rows($result) > 0){
						$myrow = mysql_fetch_array($result);
						
						do{
						$r = $myrow['rating'] / $myrow['q_vote'];
						$r = intval($r);
						printf("
							<div class='post__stati'>
								<div class='top__stati'>
									<p class='post__title'><img class='mini' align='left' src='%s'><a href='view_post.php?id=%s'>%s</a></p>
									<p class='post__adds'>Дата создания: %s</p>
									<p class='post__adds'>Автор урока: %s</p>
								</div>	
									<p>%s</p>
									<p class='view'>Просмотров: %s &nbsp; &nbsp; Рейтинг: <img src='img/%s.gif'</p>
							</div>
						",  $myrow['mini_img'], $myrow['id'], $myrow['title'],$myrow['date'], $myrow['author'], $myrow['description'], $myrow['view'], $myrow['rating'], $r);
					}while( $myrow = mysql_fetch_array($result) );
					
					}else{
						echo "<p>Информация по запросу не может быть извлечена, в таблице нет таких записей</p>";
						exit();
					}			
				?>
			</div>
		</div>
		<?php include("blocks/footer.php") ?>
	</div>

</body>
</html>
