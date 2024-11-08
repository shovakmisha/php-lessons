<?php ## Явное освобождение ресурсов.
  // Класс, упрощающий ведение разного рода журналов.
  class FileLogger0
  {
    public $f;          // открытый файл
    public $name;       // имя журнала
    public $lines = []; // накапливаемые строки

    // Создает новый файл журнала или открывает дозапись в конец
    // существующего. Параметр $name - логическое имя журнала.
    public function __construct($name, $fname)
    { 
      $this->name = $name;
      $this->f = fopen($fname, "a+");
    }

    // Добавляет в журнал одну строку. Она не попадает в файл сразу
    // же, а накапливается в буфере - до самого закрытия (close()).
    public function log($str)
    {
// Каждая строка предваряется текущей датой и именем журнала.
      $prefix = "[".date("Y-m-d_h:i:s ")."{$this->name}] ";

      $str = preg_replace('/^/m', $prefix, rtrim($str));

      // Сохраняем строку.
      $this->lines[] = $str."\n";

    }

// Закрывает файл журнала. Должна ОБЯЗАТЕЛЬНО вызываться
// в конце работы с объектом!
    public function close()
    {
// Вначале выводим все накопленные данные.
      fputs($this->f, join("", $this->lines));
      // Затем закрываем файл.
      fclose($this->f);
    }
  }

	$new = new FileLogger0('Shovak','new.txt');
    $new->log('log');
    $new->close();

?>


