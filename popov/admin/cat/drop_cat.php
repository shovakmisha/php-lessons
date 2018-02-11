<?php 
include ("../lock.php");
include ("../blocks/bd.php");
if (isset($_POST['id'])) {$id = $_POST['id'];}
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
					if (isset($id)){
						$result0 = mysql_query ("SELECT id FROM data WHERE cat='$id'");
						if(mysql_num_rows($result0) > 0){
							echo "<p class='message'>В категории, которую вы хотите удалить есть заметки. Можно удалять только пустые категории</p>";
						}else{
							$result = mysql_query ("DELETE FROM categories WHERE id='$id'");
							if ($result == 'true') {echo "<p class='message'>Ваша категория успешно удалена!</p>";}
							else {echo "<p>Ваша категория не удалена!</p>";}
						}
					}else{
						echo "<p class='message'>Вы запустили данный файл без параметра id и поэтому, удалить категорию невозможно (скорее всего Вы не выбрали радиокнопку на предыдущем шаге).</p>";
					}
				?>
			</div>
		</div>	
		<?php  include ("../blocks/footer.php");        ?>
	</div>	
</body>
</html>
