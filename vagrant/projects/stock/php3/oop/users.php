<?php

    function __autoload($className) {
        require_once "classes/$className.class.php";
    }


	$user1= new User('John', 'john', '12345');
	$user1->showinfo();	
		
	$user2= new User('Mike', 'mike', '2222');
	$user2->showinfo();		
		
	$user3= new User('Vasya', 'vasya', '3333333');
	$user3->showinfo();

	// echo $user3->name;
    $superUser = new SuperUser('super', 'super', '333', "admin");
    $superUser->showinfo();
    $superUser->getInfo();
    echo  $superUser->get_args()[0];

?>