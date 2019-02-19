<?php

/*
function numbers(){
	echo 'Start';
	for($i = 0; $i < 5; ++$i){
		yield $i;
	}
	echo 'Finish';
}

foreach ( numbers() as $value ){
	echo "VALUE: $value"."<br>";
}
*/



// Возврат ключей?
/*
	function gen() {
		yield 'a';
		yield 'b';
		yield 'name' => 'John';
		yield 'd';
		yield 'r' => 'e';
		yield 'f';
	}

// вивести значение!
	foreach (gen() as $key => $value){
		echo "$key : $value".'<br>';
	}

	echo '<hr>';
*/

// Co-routines: принимаем значение!
	function echoLogger() {
		while (true) {
			echo 'Log: ' . yield . "<br>";
		}
	}

	$logger = echoLogger();


// print_r($logger);

	$logger->send('Foo111');
	$logger->send('Bar');



// Комбинируем возврат и приём значений

	function numbers() {
		$i = 0;

		while (true) {
			$cmd = (yield $i);
			++$i;
			echo $cmd;
			if ($cmd == 'stop')
				return; // Выход из цикла
		}

	}
	$gen = numbers();
	foreach ($gen as $v) {
		if ($v == 3)
			$gen->send('stop');
		//echo $v;
	}


/* Итератор для чтения данных из файла */
//class FileIterator implements Iterator {
//  private $f;
//  private $data;
//  private $key;
//
//  public function __construct($file) {
//    $this->f = fopen($file, 'r');
//    if (!$this->f) throw new Exception();
//  }
//  public function __destruct() {
//    fclose($this->f);
//  }
//  public function current() {
//    return $this->data;
//  }
//  public function key() {
//    return $this->key;
//  }
//  public function next() {
//    $this->data = fgets($this->f);
//    $this->key++;
//  }
//  public function rewind() {
//    fseek($this->f, 0);
//    $this->data = fgets($this->f);
//    $this->key = 0;
//  }
//  public function valid() {
//    return false !== $this->data;
//  }
//}

//foreach (new FileIterator('data.txt') as $line)
//  echo "$line\n";


/* Чтение данных из файла с помощью генератора*/
// function getLines($file) {
// 	$f = fopen($file, 'r');
// 	if (!$f) throw new Exception();
// 		while ($line = fgets($f)) {
// 			yield $line;
// 	}
// 	fclose($f);
// }
// foreach(getLines('data.txt') as $line)
//   echo "$line\n";

?>
