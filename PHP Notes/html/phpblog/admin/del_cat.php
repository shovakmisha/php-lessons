<?php 
include ("lock.php");
include ("blocks/bd.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Страница удаления категории</title>
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
				<form class='forma' action='drop_cat.php' method='post'>
					<p class='podskazka'>Выберите категорию для удаления</p>
					<?php 
						$result = mysql_query("SELECT title,id FROM categories");      
						$myrow = mysql_fetch_array($result);
						do{
							printf ("<p><label> <input name='id' type='radio' value='%s'> %s</label></p>",$myrow["id"],$myrow["title"]);
						}while ($myrow = mysql_fetch_array($result));
					?>
					<p><input name='submit' type='submit' value='Удалить категорию !!!'></p>
			   </form> 
			</div>
		</div>	
		<?php  include ("blocks/footer.php");        ?>
	</div>
</body>
</html>
