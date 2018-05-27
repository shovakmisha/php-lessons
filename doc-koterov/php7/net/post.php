<?php ## Отправка POST-данных напрямую
header('Content-Type: text/html; charset=utf-8');
  // Содержимое POST-запроса
  $body = "first_name=Игорь&last_name=Симдянов";
  // Параметры контекста
  $opts = [
    'http' => [
      'method' => 'POST',
      'user_agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0)',
      'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
	               "Content-Type: text/html; charset=utf-8".
                  "Content-Length: " . mb_strlen($body),
      'content' => $body
    ]
  ];
  // echo "<pre>";
  // print_r($opts);
  // exit();
  // Формируем контекст
  $context = stream_context_create($opts);
  // Отправляем запрос
  echo file_get_contents(
    'http://localhost/koterov-doc/php7/net/handler.php',
    false,
    $context
  );
?>