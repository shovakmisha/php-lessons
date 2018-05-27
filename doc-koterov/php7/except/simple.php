<?php ## Простой пример использования исключений.

  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  echo "Начало программы.<br />";
  try {
    // Код, в котором перехватываются исключения.
    echo "Все, что имеет начало...<br />";
    // Генерируем ("выбрасываем") исключение.
    throw new Exception("Hello!");
    echo "...имеет и конец.<br>";  
  } catch (Exception $e) {
    // Код обработчика.
    echo " Исключение: {$e->getMessage()}<br />";
  }
  echo "Конец программы.<br />";
?>
