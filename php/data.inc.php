<?php
	define('COPYRIGHT', '����� ���� ���-������');
		
	/*
	* �������� ������� ��� � ���� ������ �� 00 �� 23
	* � �������� ������ � ������ ����� �� 0 �� 23
	*/
	$hour = (int)strftime('%H');
	$welcome = '����� ����������';// �������������� ���������� ��� �����������
	//echo $hour;
	
	
	define('ERR_DRAW_ON_MENU', '�� ���� ������� ����...');
		$leftMenu = array(
			array('link'=>'�����', 'href'=>'index.php'),
			array('link'=>'� ���', 'href'=>'index.php?id=about'),
			array('link'=>'��������', 'href'=>'index.php?id=contact'),
			array('link'=>'������� ���������', 'href'=>'index.php?id=table'),
			array('link'=>'�����������', 'href'=>'index.php?id=calc')
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