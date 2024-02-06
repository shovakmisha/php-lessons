<?php

// Кожна строка файла буде у масиві з новим індексом

$line = [];

while( $line = fgetss($fail) ){
	$lines[] = $line;
}
// Виборка з БД. Псевдоніми, зєднання...

	//SELECT t.name, t.code, l.course // по ходу SQL вже розуміє псевдонім t
	//	RFOM teachers t // У таблицы teachers теперь будет псевдоним t
	//	INNER JOIN lessons l ON t.id = l.tid // создастся таблиця, у якої рядок буде містити поля name і code з teachers. І поле course з lessons. К-сть рядків буде зависити від к-сті совпаденій.

?>