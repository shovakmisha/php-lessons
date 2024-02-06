<?php
    require_once "session.inc.php";
    require_once "secure.inc.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Создание пользователя</title>
	<meta charset="utf-8">
</head>

<body>
<h1>Создание пользователя</h1>
<?php
$login = 'root';
$password = '1234';
$result = '';

if ($_SERVER['REQUEST_METHOD']=='POST'){
	$login = $_POST['login'] ?: $login;
	if(!userExists($login)){
		$password = $_POST['password'] ?: $password;
		$hash = getHash($password);
		if(saveUser($login, $hash))
			$result = 'Хеш '. $hash. ' успешно добавлен в файл';
		else
			$result = 'При записи хеша '. $hash. ' произошла ошибка';
	}else{
		$result = "Пользователь $login уже существует. Выберите другое имя.";
	}
}

?>

<h3><?php echo $result; ?></h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<p>
		<label for="txtUser">Логин</label>
		<input id="txtUser" type="text" name="login" value="<?php echo $login; ?>" style="width:40em"/>
	</p>
	<p>
		<label for="txtString">Пароль</label>
		<input id="txtString" type="text" name="password" value="<?php echo $password; ?>" style="width:40em"/>
	</p>
	<div>
		<button type="submit">Создать</button>
	</div>	
</form>
</body>
</html>