<?php 
include ("../lock.php");
include ("../blocks/bd.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}

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
	
	if ( isset($titleFlag) && isset($adressFlag) ){
		$result3 = mysql_query("UPDATE videos SET title='$title', src='$src' WHERE id='$id' ");

		if ($result3 == 'true'){
			$mess = "<p class='message'>Ваше видео успешно отредактировано!</p>";
		}else{
			$mess = "<p class='message'>Ваше видео не отредактировано!</p>";
		}
	}else{
		$mess = "<p class='message'>Поля должны быть заполнены.</p>";
	}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Страница редактирования видео</title>
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
				
				<div class='forma'>
					<?php 
					if (!isset($id)){
						$result = mysql_query("SELECT title,id FROM videos");      
						$myrow = mysql_fetch_array($result);
						
						echo "<p class='podskazka'>Выберите видео, которое вы хотите отредактировать</p>";
						do{
							printf ("<div><a href='edit_video.php?id=%s'> %s</a></div>",$myrow["id"],$myrow["title"]);
						}while ($myrow = mysql_fetch_array($result));
					}else{
						$result = mysql_query("SELECT * FROM videos WHERE id=$id");      
						$myrow = mysql_fetch_array($result);

						echo "<p class='post_title'>Редактирование видео</p>";

						print <<<HERE
								$mess
								<form name='form1' method='post' action=''>
									 <p>
									   <label>Название видео<br>
										 <input value="$myrow[title]" type="text" name="title" id="title"> $titleText
										 </label>
									 </p>
								
									 <p>
									   <label>Путь к видео<br>
									   <input value="$myrow[src]" type="text" name="src" id="src"> $adressText
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
</table>
</body>
</html>
