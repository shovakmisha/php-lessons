<?php 
include ("../lock.php");
include ("../blocks/bd.php");

$mess = '';

if (isset($_POST['id'])) {$id = $_POST['id'];}

if (isset($_POST['submit'])){
	if (isset($id)){
		$result = mysql_query ("DELETE FROM videos WHERE id='$id'");
		if ($result == 'true'){
			$mess = "<p class='message'>Ваше видео успешно удалено!</p>";
		}else{
			$mess = "<p class='message'>Ваше видео не удалено!</p>";
		}
	}else{
		$mess = "<p class='message'>Вы не выбрали радиокнопку.</p>";
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Удалить видео</title>
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
				<?php echo $mess; ?>
				<form class='forma' action='' method='post'> 
					<p class="podskazka">Bыберите видео, котороє вы хотите удалить</p>
					<?php 
						$result = mysql_query("SELECT title,id FROM videos");      
						while ($myrow = mysql_fetch_array($result)){
							printf ("<div>
										<label>
											<input name='id' type='radio' value='%s'> %s
										</label>
									</div>"
										,$myrow["id"],$myrow["title"]);
						};
					?>
					<p><input name='submit' type='submit' value='Удалить видео !!!'></p>
				</form>     
			</div>
		</div>
		<?php  include ("../blocks/footer.php");        ?>  
	</div>
</body>
</html>
