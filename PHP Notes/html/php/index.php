<?php

 phpinfo();

	include 'lib.inc.php';
	include 'data.inc.php';
	
	$title = 'Сайт нашей школы';
	$header = "$welcome Гость";
	@$id = strip_tags($_GET['id']);
	@$id = trim($_GET['id']);
	@$id = strtolower($_GET['id']);
	switch($id){
		case 'about':
			$title = 'О сайте';
			$header = 'О нашем сайте'; break;
		case 'contacts':
			$title = 'Контакты';
			$header = 'Обратная связь'; break;
		case 'table':
			$title = 'Таблица умножения';
			$header = 'Таблица умножения'; break;
		case 'calc':
			$title = 'Онлайн калькулятор';
			$header = 'Калькулятор'; break;
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
	<head>
		<title><?php echo $title ?></title>
		    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<?php
			// Установка локали и выбор значений даты
			setlocale(LC_ALL, "russian");
			$day = strftime('%d');
			$mon = strftime('%B');
			$year = strftime('%Y');
		?>	
		<div id="header">
			<!-- Верхняя часть страницы -->
			<?php include 'top.inc.php'; ?>
		</div>
		
		
		
		<div id="nav">
			<!-- Навигация -->	
			<?php 
				include 'menu.inc.php'; 
				 if(!drawMenu($leftMenu)){
					echo ERR_DRAW_ON_MENU;
				}
				
			?>
		</div>	
		<div id="content">
			<!-- Заголовок -->
			<?php echo $header ?>
			
			
			
			<?php 
				switch($id){
					case 'about':
						include 'about.php'; break;
					case 'contacts':
						include 'contacts.php'; break;
					case 'table':
						include 'table.php'; break;
					case 'calc':
						include 'calc.php'; break;
					default:
						include 'index.inc.php'; 
				}	
			?>
		</div>	
		<div id="footer">
			<!-- Нижняя часть страницы -->	
			<?php include 'bottom.inc.php'; ?>
		</div>	
		
		

		

		
	</body>
</html>