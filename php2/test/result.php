<?php
	$result = 0; // Переменная для сумы ответов
	if( isset($_SESSION['test']) ){
		// Зачитываем файлы из ini-файла в масив
		$answers = parse_ini_file("answers.ini");
		// Проходим по ответам и смотрим есть ли среди них правильные
		foreach($_SESSION['test'] as $value){
			if(array_key_exists($value, $answers) ){
				// Сумируем правильные ответы
				$result += (int)$answers[$value];
			}
			// Очищаем даные сессии
			session_destroy();	
		}
	}
?>
<table width="100%">
	<tr>
		<td align="left">
			<p>Ваш результат: <?php echo $result ?> из 30</p>
		</td>
	</tr>
</table>