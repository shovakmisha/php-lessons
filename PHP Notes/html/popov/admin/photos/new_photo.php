<?php
include ("../lock.php");
include ("../blocks/bd.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Страница добавления новой картинки</title>

	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.css">
	
	<link rel="stylesheet" href="../css/md-1200.css">
	<link rel="stylesheet" href="../css/sm-992.css">
	<link rel="stylesheet" href="../css/xs-768.css">
	<link rel="stylesheet" href="../css/media-480.css">	
	
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="../js/bootstrap.js" type="text/javascript"></script>
	<script src="../js/custom.js" type="text/javascript"></script>
</head>
<body>
	<div class='container'>
		<?php include("../blocks/header_2.php");   ?>
		<div class='row'>
			<?php include ("../blocks/lefttd.php");  ?>
			<div class='content col-lg-10 col-md-9 col-sm-9 col-xs-12'>
				<div class="ik">
					<img src='../img/ik.png'>
				</div>
			   <form class='forma' name="form1" method="post" action="add_photo.php">
				 <p>
				   <label>Введите название картинки<br>
						<input type="text" name="title" id="title">
					</label>
				 </p>
				  <p>
				   <label>Введите путь к миниатюре картинки<br>
						<input type="text" name="mini" id="mini">
				   </label>
				 </p>
				 <p>
				   <label>Введите путь к картинке<br>
						<input type="text" name="full" id="full">
				   </label>
				 </p>
				 <p>
				   <label>
						<input type="submit" name="submit" id="submit" value="Занести картинку в базу">
				   </label>
				 </p>
			   </form>
			   <p>&nbsp;</p>
			</div>
		</div>	
		<?php  include ("../blocks/footer.php");        ?>  
	</div>	
	
</body>
</html>
