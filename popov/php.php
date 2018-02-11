<?php 
	include("blocks/db.php");
	$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='php'",$db);
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
					<?php $n=2; include("blocks/nav.php") ?>
					<div class="ik">
						<img src='img/ik.png'>
					</div>
					<?php echo $myrow["text"]; ?>
				</div>
			</div>
		<?php include("blocks/footer.php") ?>
	</div>

</body>
</html>
