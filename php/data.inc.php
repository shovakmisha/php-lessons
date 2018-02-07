<?php
	define('COPYRIGHT', 'Супер Мега Веб-мастер');
		
	/*
	* Получаем текущий час в виде строки от 00 до 23
	* и приводим строку к целому числу от 0 до 23
	*/
	$hour = (int)strftime('%H');
	$welcome = 'Добро пожаловать';// Инициализируем переменную для приветствия
	//echo $hour;
	
	
	define('ERR_DRAW_ON_MENU', 'Не могу вывести меню...');
		$leftMenu = array(
			array('link'=>'Домой', 'href'=>'index.php'),
			array('link'=>'О нас', 'href'=>'index.php?id=about'),
			array('link'=>'Контакты', 'href'=>'index.php?id=contact'),
			array('link'=>'Таблица умножения', 'href'=>'index.php?id=table'),
			array('link'=>'Калькулятор', 'href'=>'index.php?id=calc')
		);
		function drawMenu($menu, $vertical=true){
			if(!is_array($menu)){return false;}
			$style='';
			if(!$vertical){
				$style= " style='display:inline; margin-right: 15px'";
			}
			echo "<ul>";
			foreach($menu as $punkt){
				echo "<li$style>";
				echo "<a href='{$punkt['href']}'>{$punkt['link']}</a>";
				echo "</li>";	
			}
			echo "</ul>";
			return true;
		}
?>