<?php 
include ("lock.php");
include ("blocks/bd.php");

$mess= '';
	
	if (isset($_POST['id'])) {$id = $_POST['id'];}
	if (isset($_POST['text'])) {$text = $_POST['text'];}
	if (isset($_POST['surname'])) {$surname = $_POST['surname'];}
	if (isset($_POST['name'])) {$name = $_POST['name'];}
	if (isset($_POST['lastname'])) {$lastname = $_POST['lastname'];}
	if (isset($_POST['email'])) {$email = $_POST['email'];}
	if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
	if (isset($_POST['skype'])) {$skype = $_POST['skype'];}
	if (isset($_POST['map'])) {$map = $_POST['map'];}
	if (isset($_POST['title'])) {$title = $_POST['title'];}
	if (isset($_POST['meta_d'])) {$meta_d = $_POST['meta_d'];}
	if (isset($_POST['meta_k'])) {$meta_k = $_POST['meta_k'];}
	
	if (isset($_POST['submit'])){
		$result2 = mysql_query("UPDATE contacts SET text='$text', surname='$surname', name='$name', lastname='$lastname', email='$email', phone='$phone', skype='$skype', map='$map', title='$title', meta_d='$meta_d', meta_k='$meta_k' WHERE id='$id' ");
		if ($result2 == 'true'){
			$mess = "<p class='message'>Ваші контакти редаговані!</p>";
		}else{
			$mess = "<p class='message'>Ваші контакти не редаговані!!</p>";
		}
	}
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Изменить информацию о себе</title>
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
					$result = mysql_query("SELECT * FROM contacts");      
					$myrow = mysql_fetch_array($result);
					echo "<p class='post_title'>Редагування контактів</p>";

							print <<<HERE
									$mess
									<form name='form1' method='post' action=''>
										 <p>
										   <label>Текст<br>
											 <textarea  name="text" id="text" cols='60' rows='5'>$myrow[text]</textarea>
											 </label>
										 </p>
									
										 <p>
										   <label>Прізвище<br>
										   <input value="$myrow[surname]" type="text" name="surname" id="surname">
										   </label>
										 </p>
										 <p>
										   <label>Ім’я<br>
										   <input value="$myrow[name]" type="text" name="name" id="name">
										   </label>
										 </p>
										  <p>
										   <label>По батькові<br>
										   <input value="$myrow[lastname]" type="text" name="lastname" id="lastname">
										   </label>
										 </p>
										 <p>
										   <label>Email<br>
										   <input value="$myrow[email]" type="text" name="email" id="email">
										   </label>
										 </p>
										 <p>
										   <label>Телефон<br>
										   <input value="$myrow[phone]" type="text" name="phone" id="phone">
										   </label>
										 </p>
										 <p>
										   <label>Skype<br>
										   <input value="$myrow[skype]" type="text" name="skype" id="skype">
										   </label>
										 </p>
										 <p>
										   <label>Карта<br>
										   <textarea name="map" id="map" cols='60' rows='5'>$myrow[map]</textarea>
										   </label>
										 </p>
										 <p>
										   <label>Title<br>
										   <input value="$myrow[title]" type="text" name="title" id="title">
										   </label>
										 </p>
										 <p>
										   <label>Описання<br>
										   <input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d">
										   </label>
										 </p>
										 <p>
										   <label>Ключові слова<br>
										   <input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k">
										   </label>
										 </p>
										 <input name="id" type="hidden" value="$myrow[id]">
										 
										 <p>
										   <label>
										   <input type="submit" name="submit" id="submit" value="Зберегти">
										   </label>
										 </p>
								   </form>
HERE;
						
						?>
			</div>	
		</div>
		<?  include ("blocks/footer.php");        ?>  
	</div>
</body>
</html>
