<?php
	class User{
		public $name;
		public $login;
		public $password;
		function showinfo(){
			echo "<p>Имя: ".$this->name;
			echo "<p>Логин: ".$this->login;
			echo "<p>Пароль: ".$this->password;
		}
	}
	$user1= new User;
		$user1->name= 'John';
		$user1->login= 'john';
		$user1->password= '12345';
	$user1->showinfo();	
		
	$user2= new User;
		$user2->name= 'Mike';
		$user2->login= 'mike';
		$user2->password= '2222';
	$user2->showinfo();		
		
	$user3= new User;
		$user3->name= 'Vasya';
		$user3->login= 'vasya';
		$user3->password= '3333333';
	$user3->showinfo();	
?>