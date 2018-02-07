<?php

	class NumbersSquared implements Iterator{

		private $start, $end, $current;

		// $current = $var;

		public function __construct($start, $end){
			$this->start = $start;
			$this->end = $end;
		}

		public function current() {
			$current = $this->current;
			echo "current: $current\n";
			return $current * $current;
		}

		public function rewind()
		{
			echo "rewinding\n";
			$this->current = $this->start;
		}

		public function key() {
			$current = $this->current;
			echo "key: $current\n";
			return $current;
		}

		public function next() {
			//$var = next($this->var);
			//echo "next: $var\n";
			//return $var;
			$this->current++;
		}

		public function valid() {
			//$var = $this->current() !== false;
			//echo "valid: {$var}\n";
			//return $var;
			if( $this->current > $this->end ){
				return false;
			}
			return true;
		}

	}

	// $values = [1, 2, 3];

	$obj = new NumbersSquared(1, 5);

	foreach($obj as $num => $square){
		echo '<br />';
		echo "Квадрат числа $num = $square\n";
	}

?>