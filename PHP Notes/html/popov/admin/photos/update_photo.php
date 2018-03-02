<?php 
include ("../lock.php");
include ("../blocks/bd.php");
if (isset($_POST['title'])){
	$title = $_POST['title']; 
	if ($title == ''){
		unset($title);
	}
}

if (isset($_POST['mini']))      {$mini = $_POST['mini']; if ($mini == '') {unset($mini);}}
if (isset($_POST['full']))      {$full = $_POST['full']; if ($full == '') {unset($full);}}
if (isset($_POST['secret']))      {$secret = $_POST['secret']; if ($secret == '') {unset($secret);}}
if (isset($_POST['id']))      {$id = $_POST['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Обработчик</title>
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
			<?php include("../blocks/lefttd.php") ?>
			<div class='content col-lg-10 col-md-9 col-sm-9 col-xs-12'>
				<div class="ik">
					<img src='../img/ik.png'>
				</div>
				<?php 
					if (isset($title) && isset($mini)&& isset($full)&& isset($id)){
						$result = mysql_query ("UPDATE fotos SET title='$title', mini='$mini', full='$full' WHERE id='$id'");

						if ($result == 'true') {echo "<p class='message'>Ваша картинка успешно обновлена!</p>";}
						else {echo "<p class='message'>Ваша картинка не обновлена!</p>";}
					}else{
						echo "<p class='message'>Вы ввели не всю информацию, поэтому картинка в базе не может быть обновлена.</p>";
					}
				?> 
				<?  include ("../blocks/footer.php");        ?>  
			</div>
		</div>
	</div>
</body>
</html>
