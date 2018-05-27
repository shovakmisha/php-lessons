<?php 
	include("blocks/db.php");

?>
<!doctype html>

<html>
<head>
	<title><?php echo 1; ?></title>
	<meta name="description" content="<?php echo 2; ?>">
	<meta name="keywords" content="<?php echo 2; ?>">
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
					<?php $n=3; include("blocks/nav.php") ?>
					<div class="ik">
						<img src='img/ik.png'>
					</div>
					<?php
					
							$result = mysql_query("SELECT * FROM videos ORDER BY id DESC",$db);
							if(!$result){
								echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
								exit(mysql_error());
							}
							
							if(mysql_num_rows($result) > 0){
								$myrow = mysql_fetch_array($result);
								
								
							}else{
								echo "<p>Нет видео</p>";
								exit();
							}
					
						do{
						printf("<div class='vid col-lg-6 col-md-6 col-sm-6 col-xs-12'><span>%s</span><br>
								<iframe class='viframe' src='https://www.youtube.com/embed/%s' frameborder='0' allowfullscreen></iframe>
							</div>", $myrow['title'], $myrow['src']);
						}while( $myrow = mysql_fetch_array($result) );
					?>
				</div>
			</div>
		<?php include("blocks/footer.php") ?>
	</div>

</body>
</html>
