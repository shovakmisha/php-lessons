<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
	<head>
		<title>���� ����� �����</title>
		    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<div>
			<?php /*
				$name = 'John'; 
				// ���� �������, ��� ����� LABEL ��� ���������� 
				echo <<<LABEL
				Na"m"e: c:\ $
					$name
LABEL;
// ------------ ��������� �������� --------------
echo "<br/>";

if($name){
	echo "��� � �������";
}else{
	"��� �����";
}
// ��� ����, �� 
echo "<br/>";
echo ($name)? "��� � �������" : "��� �����";

// ------------ ���� foreach--------------

$user = [1, "Vasya"]; $user[5] = true;
	foreach($array as $key =>$value){
		echo $key, $value;
	}
echo "<pre> $x </pre>";

// ------------ �������� ������, ����������� ������ �� ���� --------------

	function sayHello(&$name){
		echo "<h1>������ $name</h1>";
		$name = "����";
	}
	sayHello("John"); // ��� ���� �������, �� ������ � �� �� �� ���������
	$name = "Mike";
	sayHello($name); // Mike
	sayHello(&$name); // ��������, ���� ���� �� ���������
	
// ------------ ������� ������������  --------------	
	function numbers(){
		return array(0,1,2);		
	}
	list($zero, $one, $two) = numbers(); // $zero = 0; $one = 1; $two = 2;

// ------ ���������� �-���, ��� ���� ������ �������� � ����� (�������� � ��� �������������) ---------		

	$arr = [0,1,2,3,'rrr'];			
		function myCount($a, $mode=0){
			if( gettype($a) == 'NULL'){echo 'NULL';}
			if(gettype($a) == 'integer' or gettype($a) == 'string'){echo 1;}
			if(gettype($a) == 'array'){
				$i = 0;
				foreach($a as $test){
					if(is_array($test) and $mode==1){
						$i += myCount($a, 1);
					}
					$i++;
				} 
				return $i;
			}
		}
		echo myCount($arr);
*/			

			//echo $time = time();
			echo date( "l" );
			
			?>
		</div>
	</body>
</html>