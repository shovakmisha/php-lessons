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
if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}
if (isset($_POST['date']))        {$date = $_POST['date']; if ($date == '') {unset($date);}}
if (isset($_POST['description'])) {$description = $_POST['description']; if ($description == '') {unset($description);}}
if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['author']))      {$author = $_POST['author']; if ($author == '') {unset($author);}}
if (isset($_POST['img']))      {$img = $_POST['img']; if ($img == '') {unset($img);}}
if (isset($_POST['cat']))      {$cat = $_POST['cat']; if ($cat == '') {unset($cat);}}
if (isset($_POST['secret']))      {$secret = $_POST['secret']; if ($secret == '') {unset($secret);}}
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
					if (isset($title) && isset($meta_d) && isset($meta_k) && isset($date) && isset($description) && isset($text) && isset($author) && isset($img) && isset($cat) && isset($secret)){
						$result = mysql_query("INSERT INTO data (title,meta_d,meta_k,date,description,text,author,mini_img,cat,secret) VALUES ('$title', '$meta_d','$meta_k','$date','$description','$text','$author','$img','$cat',$secret)");

						if ($result == 'true'){
							echo "<p class='message'>Ваша заметка успешно добалена!</p>";
						}else{
							echo "<p class='message'>Ваша заметка не добалена!</p>";
						}
					}else{
						echo "<p class='message'>Вы ввели не всю информацию, поэтому заметка в базу не может быть добален.</p>";
					}
				?>
			</div>	
		</div>
		<?  include ("../blocks/footer.php");        ?>  
	</div>
</body>
</html>
