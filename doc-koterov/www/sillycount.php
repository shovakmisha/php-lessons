<?php ## Счетчик посещения страницы одним пользователем.
  $counter = isset($_COOKIE['counter']) ? $_COOKIE['counter'] : 0;
  $counter++;
  setcookie("counter", $counter, 0x7FFFFFFF);
  # Внимание! $_COOKIE['counter'] этот вызов не обновляет!
  # Новое значение будет доступно только при следующем посещении.
  echo "Вы запустили этот сценарий $counter раз(а).";

  $url = "sullivan=paul&names[roy]=noni&names[read]=tom";



	//echo '<pre>';
		print_r(parse_str($url));
	//echo '</pre>';

	echo $names['roy'];

?>