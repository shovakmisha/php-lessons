<?php 
	include("blocks/db.php");
	$result = mysql_query("SELECT * FROM contacts",$db);

	if(!$result){
		echo "<p>Запрос на выборку из базы не прошел. Напишите об этом администратору admin@mail.ru<br>Код ошибки: </p>";
		exit(mysql_error());
	}
	
	if(mysql_num_rows($result) > 0){
		$myrow = mysql_fetch_array($result);
	}else{
		echo "<p>Информация по запросу не может быть извлечена, в таблице нет таких записей</p>";
		exit();
	}
	
	
	

	
	
?>
<!doctype html>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<title><?php echo $myrow["title"]; ?></title>
	<meta name="description" content="<?php echo $myrow["meta_d"]; ?>">
	<meta name="keywords" content="<?php echo $myrow["meta_k"]; ?>">
	
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	
	<link rel="stylesheet" href="css/md-1200.css">
	<link rel="stylesheet" href="css/sm-992.css">
	<link rel="stylesheet" href="css/xs-768.css">
	<link rel="stylesheet" href="css/media-480.css">	
	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/custom.js" type="text/javascript"></script>
	
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
</head>
<body>
	<?php
		
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$secret = '6Lc2iSATAAAAAEQZ_77t7v3z4SUPzyyHYm9poXm_';
		$recaptcha = $_POST['g-recaptcha-response'];
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$url_data = $url.'?secret='.$secret.'&response='.$recaptcha.'&remoteip='.$ip;
		
		$curl = curl_init();
		
		curl_setopt($curl,CURLOPT_URL,$url_data);
		
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
		
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		
		$res = curl_exec($curl);
		
		curl_close($curl);
		
		$res = json_decode($res);
		
		if($res -> success){
			
			if( isset( $_POST['name'] ) ){
				$name = $_POST['name'];
			}
			if( isset( $_POST['telefon'] ) ){
				$telefon = $_POST['telefon'];
			}
			
			
			$result3 = mysql_query("SELECT email FROM contacts", $db);
			$myrow3 = mysql_fetch_array($result3);
			
			$address = $myrow3['email'];
			$subject = "Зворотній звя’зок";
			
			$message = "Передзоніть мені \n Имя : ".$name." \n Номер телефона : ".$telefon;
			mail($address,$subject,$message, "Content-type:text/plain; Charset=windows-1251\r\n");
			
			echo "<div class='chel'></div>";
		}
	}
		
		
		
		
	?>
	
	<div class='container'>
		<?php include("blocks/header.php") ?>
			<div class='row'>
				<?php include("blocks/left.php") ?>
				<div class='content col-lg-10 col-md-9 col-sm-9 col-xs-12'>
					<?php $n=4; include("blocks/nav.php") ?>
					<div class="ik">
						<img src='img/ik.png'>
					</div>
					<?php
						do{
						printf("
								<p>%s</p>
								<hr>
								<p>%s %s %s</p>
								<p>Email: <a href='mailto:%s'> %s </a></p> 
								<p>Телефон: <a href='tel:%s'> %s </a></p>
								<p>Skype: <a href='skype:%s'> %s </a></p>
								<p>%s</p>
							",  $myrow['text'], $myrow['surname'], $myrow['name'], $myrow['lastname'], $myrow['email'], $myrow['email'], $myrow['phone'], $myrow['phone'], $myrow['skype'], $myrow['skype'], $myrow['map']);
						}while( $myrow = mysql_fetch_array($result) );
					?>
					
<button class="btn btn-info btn-lg" type="button" data-toggle="modal" data-target="#myModal">Показать всплывающее окно</button > 
<div id="myModal" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header"><button class="close" type="button" data-dismiss="modal">X</button>
<h4 class="modal-title">Заголовок окна</h4>
</div>
<div class="modal-body">Текст уведомления</div>
<div class="modal-footer"><button class="btn btn-default" type="button" data-dismiss="modal">Закрыть</button></div>
</div>
</div>
</div>
	
					<form name='c_form' id='c_form' method='POST' action=''>
						<p>Залишились питання?<br>Напишіть нам свої дані і ми вам передзвонимо</p>
						<p><input type='text' name='name' placeholder='Імя' id='name'> </p>
						<p><input type='text' name='telefon' placeholder='Ваш телефон' id='telefon'> </p>
						<div class='div_c'><span>Подтвердите, что вы не робот</span><br>
							<div class="g-recaptcha" data-sitekey="6Lc2iSATAAAAADZN5AC0dvUXnbZ09qzhR0dQY0NP"></div>
						</div>	
						<p><input onclick='return checkForm()' type='submit' name='submit' id='submit' value='Отправить'></p>
					</form> 
				
				</div>
			</div>
		<?php include("blocks/footer.php") ?>
	</div>

	<script>
		
	</script>
	
</body>
</html>
