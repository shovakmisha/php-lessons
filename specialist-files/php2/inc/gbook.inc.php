<?PHP  header("Content-Type: text/html; charset=utf-8");?>
<!-- Основные настройки -->

<?php
	define("DB_HOST", "localhost");
	define("DB_LOGIN", "root");
	define("DB_PASSWORD", "123");
	define("DB_NAME", "gbook");

	$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);

	// Ф-ція провірки
	function clearStr($data){
		global $link; // щоб заціпило і її
		return mysqli_real_escape_string($link, trim(strip_tags($data))); // Не знаю нашто тручати сюди $link, но треба
	}
?>
<!-- Основные настройки -->



<!-- Сохранение записи в БД -->
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = '';
		$email = '';
		$msg = '';
		
		if( isset($_POST['name']) ){
			$name = $_POST['name'];
			$name = clearStr($name);

		}
		if( isset($_POST['email']) ){
			$email = $_POST['email'];
			$email = clearStr($email);

		}
		if( isset($_POST['msg']) ){
			$msg = $_POST['msg'];
			$msg = clearStr($msg);

		}
		$sql = "INSERT INTO msgs (name, email, msg)
						VALUES ('$name', '$email', '$msg')";
		$result = mysqli_query($link, $sql) or die(mysqli_error($link));
		header('Location: '.$_SERVER['REQUEST_URI']);
		exit;
	}
?>
<!-- Сохранение записи в БД -->



<!-- Удаление записи из БД -->
<?php
	
	if( isset($_GET['del']) ){
		$del = $_GET['del'];
	}

	$sql3 = "DELETE FROM msgs WHERE id='$del'";
	$result3 = mysqli_query($link, $sql3);

?>
<!-- Удаление записи из БД -->
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<!-- Вывод записей из БД -->

<?php
	$sql2 = "SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime) as dt FROM msgs ORDER BY id DESC";
	$result2 = mysqli_query($link, $sql2);
	mysqli_close($link);
	$count = mysqli_num_rows($result2);
	echo "Всего записей в гостевой книге: ".$count;
	
	
	
	
	while( $fetch = mysqli_fetch_array($result2) ){
		$d = $fetch['dt'];
		$mydate = date('d-m-y', $d);
		$mytime = date('H:i', $d);
		print <<<HERE
			<hr>
			<p>
				<a href='mailto:$fetch[email]'>$fetch[name]</a> $mydate в $mytime написал:
				<br />$fetch[msg]
			</p>
			<p align='right'>
				<a href='http://localhost/php2/index.php?id=gbook&del=$fetch[id]'>Удалить</a>
			</p>
HERE;
	}
	
?>

<!-- Вывод записей из БД -->

