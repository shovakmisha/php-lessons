<?php 
include ("lock.php");
include ("blocks/bd.php");

if (!isset($_POST['submit'])){
	exit("<p>На этот файл можно зайти только через форму</p>");
}
if (isset($_POST['name'])){
	$name = $_POST['name']; 
	if ($name == ''){
		unset($name);
	}
}
if (isset($_POST['link']))      {$link = $_POST['link']; if ($link == '') {unset($link);}}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Обработчик</title>
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
			<?php include ("blocks/lefttd.php");  ?>
			<div class='content col-lg-10 col-md-9 col-sm-9 col-xs-12'>
				<div class="ik">
					<img src='img/ik.png'>
				</div>
				 <?php 
					if (isset($name) && isset($link)){
						$result = mysql_query("INSERT INTO friends (name,link) VALUES ('$name', '$link')");

						if ($result == 'true'){
							echo "<p class='message'>Ваш друг успешно добален</p>";
						}else{
							echo "<p class='message'>Ваш друг не добален!</p>";
						}
					}else{
						echo "<p class='message'>Вы ввели не всю информацию, поэтому друг в базу не может быть добален.</p>";
					}
				 ?>
			</div>
		</div>
		<?php  include ("blocks/footer.php");        ?> 
	</div>
</body>
</html>
