<?php
	// Сокетное соединение
	// Создаем сокет (host+порт)
	$socket = fsockopen("stock.on", 80, $sock_errno, $sock_errmsg, 30);
	
	// Создаем POST-строку
	$str_query = "name=John&age=25";
	
	// Посылка HTTP-запроса
	$out = "POST /php3/demo/socket/dummy.php HTTP/1.1\r\n";
	$out .= "Host: mysite.local\r\n";
	$out .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$out .= "Content-length: " . strlen($str_query). "\r\n\r\n";
	
	$out .= $str_query;
	fwrite($socket, $out);
	
	// Получаем и выводим ответ
	while (!feof($socket)) {
		echo fgets($socket, 4096);	
	}

	// Закрытие соединения
	fclose($socket);
?>