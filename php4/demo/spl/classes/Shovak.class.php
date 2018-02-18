<?php



	class Shovak
	{

		public $name;
		public static  function call() {
			echo  'You call "' . __CLASS__ . '" class.';
		}

		function __construct($name)
		{
			$this->name = $name;
		}

		function showInfo(){
			echo $this->name;
		}

	}

