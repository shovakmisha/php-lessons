<?php
include ("../lock.php");
include ("../blocks/bd.php");

$titleText='';
$adressText='';

$titleFlag = false;
$adressFlag = false;

$t = '/\w/';
$r= '/^\w{11,11}$/';

$mess ='';
if (isset($_POST['submit'])){

	if (isset($_POST['title'])){
		$title = $_POST['title'];
		if( !preg_match( $t, $title ) ){
			$titleText = "<small style='color: red'> Введите название видео</small>";
			unset($titleFlag);
		}else{
			$titleFlag = true;
		}
	}
	if (isset($_POST['src'])){
		$src = $_POST['src'];
		if( !preg_match( $r, $src ) ){
			$adressText = "<small style='color: red'> Введите путь к видео</small>";
			unset($adressFlag);
		}else{
			$adressFlag = true;
		}
	}
		
	if (isset($titleFlag) && isset($adressFlag)){
		$result = mysql_query("INSERT INTO videos (title,src) VALUES ('$title', '$src')");

		if ($result == 'true'){
			$mess = "<p class='message'>Ваше видео успешно добалено!</p>";
		}else{
			$mess = "<p class='message'>Ваше видео не добалено!</p>";
		}
	}else{
		$mess = "<p class='message'>Вы ввели не всю информацию, поэтому ваше видео в базу не может быть добалено.</p>";
	}
}
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Страница добавления нового видео</title>

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
					echo $mess;
				?>
			   <form class='forma' name="form1" method="post" action="">
				 <p>
				   <label>Введите название видео (минимум 1 символ)<br>
						<input type="text" name="title" id="title"><?php  echo $titleText  ?>
					</label>
				 </p>
				  <p>
				   <label>Введите адрес видео<br>
						<input type="text" name="src" id="src"><?php  echo $adressText  ?>
				   </label>
				 </p>
				
				 <p>
				   <label>
						<input type="submit" name="submit" id="submit" value="Занести видео в базу">
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
