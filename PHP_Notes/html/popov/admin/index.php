<?php include ("lock.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Главная страница блока администратора</title>
	<meta charset="windows-1251">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="style.css">
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
		<?php include("blocks/header.php");   ?> 
		<div class='row'>
			<?php include("blocks/lefttd.php") ?>
			<div class='content col-lg-10 col-md-9 col-sm-9 col-xs-12'>
				<div class="ik">
					<img src='img/ik.png'>
				</div>
				 <p class='golovna'>Добро пожаловать в админский блок.</p>
			</div>
		</div>
		<?php include("blocks/footer.php") ?>
	</div>
</body>
</html>
