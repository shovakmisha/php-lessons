<?php 
include ("lock.php");
include ("blocks/bd.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Страница изменения текстов</title>
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
				<div class='forma'>
					<p class="podskazka">Выберите страницу для редактирования данных</p>      
					<?php 
						if (!isset($id)){
							$result = mysql_query("SELECT title,id FROM settings");      
							$myrow = mysql_fetch_array($result);
							do{
								printf ("<p><a href='edit_text.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
							}while ($myrow = mysql_fetch_array($result));
						}else{
							$result = mysql_query("SELECT * FROM settings WHERE id=$id");      
							$myrow = mysql_fetch_array($result);
							print <<<HERE
							<form name="form1" method="post" action="update_text.php">
									 <p>
									   <label>Введите название страницы (тэг title)<br>
										 <input value="$myrow[title]" type="text" name="title" id="title">
										 </label>
									 </p>
									 <p>
									   <label>Введите краткое описание страницы<br>
									   <input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d">
									   </label>
									 </p>
									 <p>
									   <label>Введите ключевые слова для страницы<br>
									   <input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k">
									   </label>
									 </p>
									
									 <p>
									   <label>Введите полный текст страницы с тэгами<br>
									   <textarea name="text" id="text" cols="40" rows="20">$myrow[text]</textarea>
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
		<?  include ("blocks/footer.php");        ?>  
	</div>
</body>
</html>
