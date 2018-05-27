<?php 
include ("../lock.php");
include ("../blocks/bd.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Страница редактирования друга</title>
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
				<div class='forma'>
					<?php 
						if (!isset($id)){
							$result = mysql_query("SELECT name,id FROM friends");      
							$myrow = mysql_fetch_array($result);
							echo "<p class='podskazka'>Выберите заметку, которую вы хотите отредактировать</p>";
							do{
								printf ("<p><a href='edit_friend.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["name"]);
							}while ($myrow = mysql_fetch_array($result));
						}else{
							$result = mysql_query("SELECT * FROM friends WHERE id=$id");      
							$myrow = mysql_fetch_array($result);
							echo "<p class='post_title'>Редактирование параметров страницы друга</p>";
							print <<<HERE
									<form name='form1' method='post' action='update_friend.php'>
									 <p>
									   <label>Введите название сайта друга<br>
										 <input value="$myrow[name]" type="text" name="name" id="name">
										 </label>
									 </p>

									 <p>
									   <label>Введите ссылку на сайт друга<br>
									   <input value="$myrow[link]" type="text" name="link" id="link">
									   </label>
									 </p>
									 <input name="id" type="hidden" value="$myrow[id]">
									 
									 <p>
									   <label>
									   <input type="submit" name="submit" id="submit" value="Сохранить изменения">
									   </label>
									 </p>
								   </form>
HERE;
						}
					?>
				</div>	
			</div>
		</div>
		<?php  include ("../blocks/footer.php");        ?> 
	</div>
</body>
</html>
