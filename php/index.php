<?php

 phpinfo();

	include 'lib.inc.php';
	include 'data.inc.php';
	
	$title = '���� ����� �����';
	$header = "$welcome �����";
	@$id = strip_tags($_GET['id']);
	@$id = trim($_GET['id']);
	@$id = strtolower($_GET['id']);
	switch($id){
		case 'about':
			$title = '� �����';
			$header = '� ����� �����'; break;
		case 'contacts':
			$title = '��������';
			$header = '�������� �����'; break;
		case 'table':
			$title = '������� ���������';
			$header = '������� ���������'; break;
		case 'calc':
			$title = '������ �����������';
			$header = '�����������'; break;
		
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
			// ��������� ������ � ����� �������� ����
			setlocale(LC_ALL, "russian");
			$day = strftime('%d');
			$mon = strftime('%B');
			$year = strftime('%Y');
		?>	
		<div id="header">
			<!-- ������� ����� �������� -->
			<?php include 'top.inc.php'; ?>
		</div>
		
		
		
		<div id="nav">
			<!-- ��������� -->	
			<?php 
				include 'menu.inc.php'; 
				 if(!drawMenu($leftMenu)){
					echo ERR_DRAW_ON_MENU;
				}
				
			?>
		</div>	
		<div id="content">
			<!-- ��������� -->
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
			<!-- ������ ����� �������� -->	
			<?php include 'bottom.inc.php'; ?>
		</div>	
		
		

		

		
	</body>
</html>