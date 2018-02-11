<?php

/*


 // Простий приклад

	$minHeap = new SplMinHeap();

	$minHeap -> insert(2);
	$minHeap -> insert(3);
	$minHeap -> insert(1);

	foreach ($minHeap as $value)
		echo $value . " " . '<br>'; // 1 2 3

	echo '<hr>';

	$maxHeap = new SplMaxHeap();
	$maxHeap -> insert(2);
	$maxHeap -> insert(3);
	$maxHeap -> insert(1);
	foreach ($maxHeap as $value)
	echo $value . " " . '<br>'; // 3 2 1

*/



class Course{
  private $_name;
  public function __construct($name){
    $this->_name = $name;
  }
  public function __toString(){
    return strtolower($this->_name);
  }
  public function getName(){
    return $this->_name;
  }
}

$php = new Course('PHP');
$js = new Course('JavaScript');
$xml = new Course('XML');
$java = new Course('Java');
 
class CoursesHeap extends SplHeap{
  public function compare(Course $courseA, Course $courseB){
    return strcmp((string)$courseB, (string)$courseA);
  }
}

$coursesHeap = new CoursesHeap();

$coursesHeap->insert($php);
$coursesHeap->insert($xml);
$coursesHeap->insert($js);
$coursesHeap->insert($java);

foreach ($coursesHeap as $course) {
  print $course->getName() . "\n";
}






?>