<?php

class Queue extends SplQueue{
  protected $dataStore = [];
  
  public function enqueue($element) {
    array_push($this->dataStore, $element);
    parent::enqueue($element);
  }
  public function dequeue() {
    array_shift($this->dataStore);
    return parent::dequeue();
  }
  public function toString() {
    $retStr = "";
    $cnt = count($this->dataStore);
    for ($i = 0; $i < $cnt; ++$i) {
      $retStr .= $this->dataStore[$i] . "\n";
    }
    return $retStr . "\n";
  }

}

$users = ["Вася", "Петя", "Федя", "Саша", "Зина", "Маша"];

$q = new Queue();

foreach($users as $user)
  $q->enqueue($user);

echo $q->dequeue() . " вышел <br>";
echo "Кто в очереди:\n" . $q->toString();

echo "Кто первый: " . $q->bottom() . "<br>";
echo "Кто последний: " . $q->top() . "<br>";


/*
	class Work {
		public function __construct($title) {
			$this->title = $title;
		}
		public function doIt(){
			return $this->title;
		}
	}

	$work1 = new Work("Сходить в магазин");
	$work2 = new Work("Прочитать книгу");
	$work3 = new Work("Тупить в телевизор");

	$queue = new SplQueue();

	$queue -> enqueue($work1);
	$queue -> enqueue($work2);
	$queue -> enqueue($work3);

	while ($queue -> count() > 0){
		echo $queue -> dequeue() -> doIt();
	}
*/


?>