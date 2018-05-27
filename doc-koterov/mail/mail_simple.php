<?php ## Отправка почты по шаблону (плохой вариант).
  // Этот текст может быть получен, например, из базы данных,
  // или являться сообщением форума или гостевой книги.
  $text = "Cookies need love like everything does.";
  // Получатели письма.
  $tos = ["shovakmisha93@gmail.com"];
  // Считываем шаблон.
  $tpl = file_get_contents("mail.eml");
  // Отправляем письма в цикле по получателям.
  foreach ($tos as $to) {
    // Заменяем элементы шаблона.
    $mail = $tpl;
    $mail = strtr($mail, [
      "{TO}"   => $to,
      "{TEXT}" => $text,
    ]);
	echo 777;
    // Разделяем тело сообщения и заголовки.
    list ($head, $body) = preg_split("/\r?\n\r?\n/s", $mail, 2);

	  echo $head; echo '<br>'; echo $body;

    // Отправляем почту. Внимание! Опасный прием!
    mail("", "", $body, $head);
  }
?>