<?php 
include ("../lock.php");
include ("../blocks/bd.php");

if (isset($_POST['title'])){
	$title = $_POST['title']; 
	if ($title == ''){
		unset($title);
	}
}

/* Если существует в глобальном массиве $_POST['title'] опр. ячейка, то мы создаем простую переменную из неё. Если переменная пустая, то уничтожаем переменную.   */

if (isset($_POST['mini']))      {$mini = $_POST['mini']; if ($mini == '') {unset($mini);}}
if (isset($_POST['full']))      {$full = $_POST['full']; if ($full == '') {unset($full);}}

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
			<?php include ("../blocks/lefttd.php");  ?>
			<div class='content col-lg-10 col-md-9 col-sm-9 col-xs-12'>
				<div class="ik">
					<img src='../img/ik.png'>
				</div>
				<?php 
					if (isset($title) && isset($mini) && isset($full)){
						$result = mysql_query("INSERT INTO fotos (title,mini,full) VALUES ('$title', '$mini', '$full')");

						if ($result == 'true'){
							echo "<p class='message'>Ваша картинка успешно добалена!</p>";
						}else{
							echo "<p class='message'>Ваша картинка не добалена!</p>";
						}
					}else{
						echo "<p class='message'>Вы ввели не всю информацию, поэтому картинка в базу не может быть добалена.</p>";
					}
				?>
			</div>	
		</div>
		<?  include ("../blocks/footer.php");        ?>  
	</div>
</body>
</html>
