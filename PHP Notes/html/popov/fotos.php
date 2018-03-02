<?php 
	include("blocks/db.php");
	$result = mysql_query("SELECT mini,full FROM fotos",$db);
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
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script> 
	<script src="js/custom.js" type="text/javascript"></script>
	
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css">
	<script type="text/javascript" src="fancybox/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="fancybox/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.2.1.pack.js"></script>
		
	<script type="text/javascript">
		$(document).ready(function() {
			$("a.first").fancybox();
			$("a.two").fancybox();
			$("a.video").fancybox({"frameWidth":520,"frameHeight":400});
			$("a.content").fancybox({"frameWidth":600,"frameHeight":300});
		});
	</script> 
	
	
	
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
					
						do{
						printf("
								<a class='two' rel='group' href='%s'><img src='%s' /></a>
							",  $myrow['full'], $myrow['mini']);
						}while( $myrow = mysql_fetch_array($result) );
					?>
					<?php  ?>
				</div>
			</div>
		<?php include("blocks/footer.php") ?>
	</div>

</body>
</html>
