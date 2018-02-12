<?php

/*
// простий приклад

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

	$queue = new SplPriorityQueue();

	$queue -> insert($work1, 1);
	$queue -> insert($work2, 2);
	$queue -> insert($work3, 3);

	foreach ($queue as $work){
		echo $work -> doIt();
	}
​
*/

class Client{
  public $name;
  public $priority;
  public function __construct($name, $priority){
    $this->name = $name;
    $this->priority = $priority;
  }
}

class PriorityQueue extends SplPriorityQueue{
  private $dataStore = [];
  
  function insert($value, $priority){
    array_push($this->dataStore, $value);
    usort($this->dataStore, function($a, $b){
      return $b->priority - $a->priority;
    });
    parent::insert($value, $priority);
  }
  
  function extract(){
    array_shift($this->dataStore);
    return parent::extract();
  }
  
  function toString() {
    $retStr = ""; 
    $cnt = count($this->dataStore);
    for ($i = 0; $i < $cnt; ++$i) {
      $retStr .= $this->dataStore[$i]->name . " номер: "
		      . $this->dataStore[$i]->priority . "\n";
    }
    return $retStr . "\n";
  }
}

$bank = new PriorityQueue();
$clients = ["Пупкин", "Сумкин", "Корзинкина", "Морковкин", "Зайцев"];
shuffle($clients);

foreach($clients as $p => $client){
  $bank->insert(new Client($client, $p+1), $p+1);
}

print($bank->toString());

$current = $bank->extract();

print("Обслуживается: " . $current->name . "\n");
$bank->insert( new Client($client, $p+1), $p+1 );


echo '<pre>';
    print($bank->toString());
echo '</pre>';

$current = $bank->extract();

print("Обслуживается: " . $current->name . "<br>");
print("Ожидают очереди:\n");
print($bank->toString());

exit;

$current = $bank->extract();

print("Обслуживается: " . $current->name . "\n");
print("Обслуживается: " . $current->name . "<br>");
print("Ожидают очереди:\n");
print($bank->toString());

$current = $bank->extract();

print("Обслуживается: " . $current->name . "\n");
print("Ожидают очереди:\n");
print($bank->toString());
