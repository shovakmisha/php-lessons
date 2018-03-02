<?php 
include ("lock.php");
include ("blocks/bd.php");
if (isset($_POST['title'])){
	$title = $_POST['title']; 
	if ($title == ''){
		unset($title);
	}  
}

if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}
if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['id']))      {$id = $_POST['id'];}
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
					if (isset($title) && isset($meta_d) && isset($meta_k) && isset($text)){
						$result = mysql_query ("UPDATE categories SET title='$title', meta_d='$meta_d', meta_k='$meta_k', text='$text' WHERE id='$id'");
						if ($result == 'true') {echo "<p class='message'>Ваша категория успешно обновлена!</p>";}
						else {echo "<p class='message'>Ваша категория не обновлена!</p>";}
					}else{
						echo "<p class='message'>Вы ввели не всю информацию, поэтому урок в базе не может быть обновлен.</p>";
					}
				?>
			</div>
		</div>
		<?  include ("blocks/footer.php");?>
	</div>
</body>
</html>
