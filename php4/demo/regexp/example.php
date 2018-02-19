<?php
// Пример 1
//$subject = '00:04:23:7c:5d:01';
//
//$pattern = '/^([a-f0-9][a-f0-9]:){5}[a-f0-9][a-f0-9]$/';
//preg_match($pattern, $subject, $matches);
//echo $matches[0]; // 00:04:23:7с:5d:01
//
//$pattern = '/([a-f0-9]{2}:){5}[a-f0-9]{2}/';
//preg_match($pattern, $subject, $matches);
//echo $matches[0]; // 00:04:23:7с:5d:01
//
//// Пример 2
//$subject = 'John Smith <jsmith@site.com>';
//$pattern = '/([^<]+)<([a-zA-Z0-9_-]+@([a-zA-Z0-9_-]+\\.)+[a-zA-Z0-9_-]+)>/';
//preg_match($pattern, $subject, $matches);
//print_r($matches);
//// [0]=>John Smith <jsmith@site.com>, [1]=>John Smith, [2]=>jsmith@site.com, [3]=>site.


// . Любой символом, кроме символа перевода строки.

/*

    preg_match('/./', 'PHP 5', $matches);
        echo $matches[0]; // Р

echo '<br>';

    preg_match('/PHP.5/', 'PHP 5', $matches);
        echo $matches[0]; // РHP 5

echo '<br>';

    preg_match('/PHP.5/', 'PHP-5', $matches);
        echo $matches[0]; // РHP-5

echo '<br>';

    preg_match('/PHP.5/', 'PHP5', $matches);
        echo $matches[0]; //

// \ Экранирование метасимволов и разделителей

    preg_match('/.com/', 'site.com', $matches);
        echo $matches[0]; // .com

echo '<br>';

    preg_match('/.com/', 'site-com', $matches);
        echo $matches[0]; // -com

echo '<br>';
    preg_match('/\.com/', 'site-com', $matches);
        echo $matches[0]; //

echo '<br>';

    preg_match('/\.com/', 'site.com', $matches);
        echo $matches[0]; // .co

*/

/*
// (...) Группировка элементов.
	$subject = 'PHP is released in 1995';
	$pattern = '/PHP [a-zA-Z ]+([12][0-9])([0-9]{2})/';
	preg_match($pattern, $subject, $matches);
	echo '<pre>';
		print_r($matches);	// [0]=>PHP is released in 1995, [1]=>19, [2]=>05
	echo '</pre>';

echo '<br>';

// \b ( Позиция между соседними символами \w и \W )
	$string = "##Testing123##";
	preg_match('/\b.+\b/', $string, $matches);
		echo $matches[0]; // Testing123

echo '<br>';



// Жадные квантификаторы: * и +
	$subject = '<b>I am bold.</b> <i>I am italic.</i> <b>I am also bold.</b>';
	preg_match('#<b>(.+)</b>#', $subject, $matches);
		echo $matches[1]; 	// I am bold.</b> <i>I am italic.</i> <b>I am also	bold.
		echo '<br>';
		echo "\n";
		echo $matches[0]; 	// I am bold.</b> <i>I am italic.</i> <b>I am also	bold.

echo '<br>';

*/

/*

// m Многострочный поиск
	$subject = "ABC\nDEF\nGHI";
	preg_match('/^DEF/', $subject, $matches);
		echo $matches[0]; //
	preg_match('/^DEF/m', $subject, $matches);
		echo $matches[0]; // DEF

// echo '<br>';

// S Однострочный поиск: "." = . + перевод строки
	$subject = "ABC\nDEF\nGHI";

	preg_match('/BC.DE/', $subject, $matches);
		echo $matches[0]; //

	preg_match('/BC.DE/s', $subject, $matches);
		echo $matches[0]; // BC\nDE

echo '<br>';

// x Пропуск пробелов и комментариев(#) в тексте шаблона
	$subject = "ABC\nDEF\nGHI";
	preg_match('/A B C/', $subject, $matches);
		echo $matches[0]; //
	preg_match('/A B C/x', $subject, $matches);
		echo $matches[0]; // ABC

echo '<br>';

// D Что и $, если строка не заканчивается \n
	preg_match('/BC$/', "ABC\n", $matches);
		echo $matches[0]; // BC
	preg_match('/BC$/D', "ABC\n", $matches);
		echo $matches[0]; //

echo '<br>';

// A Что и ^ (начало строки)
	preg_match('/[a-c]{3}/i', '123ABC', $matches);
		echo $matches[0]; // ABC
	preg_match('/[a-c]{3}/iA', '123ABC', $matches);
		echo $matches[0]; //

echo '<br>';

// U Ленивость по-умолчанию
	$subject = '<b>I am bold.</b> <i>I am italic.</i> <b>Iam also bold.</b>';
	preg_match('#<b>(.+)</b>#U', $subject, $matches);
		echo $matches[1]; // I am bold.

echo '<br>';

*/


/*
// Функции поиска
	$subject = '<b>I am bold.</b> <i>I am italic.</i>';
	$pattern = '#<[^>]+>(.*)</[^>]+>#U';
	preg_match($pattern, $subject, $matches);
	//	print_r($matches); // [0]=><b>I am bold.</b>, [1]=>I am bold.


echo '<br>';
	preg_match_all($pattern, $subject, $matches,PREG_PATTERN_ORDER);
		print_r($matches);
	// [0][0] => <b>I am bold.</b>, [0][1] => <i>I amitalic.</i>
	// [1][0] => I am bold., [1][1] => I am italic.

	preg_match_all($pattern, $subject, $matches,PREG_SET_ORDER);
		print_r($matches);
	// [0][0] => <b>I am bold.</b>, [0][1] => I am bold.
	// [1][0] => <i>I am italic.</i>, [1][1] => I am italic.


echo '<br>';
// Функция замены
	$subject = 'April 15, 2003';
	$pattern = '/(\w+) (\d+), (\d+)/i';

	preg_match_all($pattern, $subject, $matches);

	echo '<pre>';
		print_r($matches);
	echo '</pre>';

	 $replace = '$2 $1, $3'; // "\$2 \$1, \$3"
	 	echo preg_replace($pattern, $replace, $subject);

echo '<br>';

*/

// Функция разделения
	$subject = 'hypertext language, programming';
	$pattern = '/[\s,]+/';
	$words = preg_split($pattern, $subject);
		print_r($words); // [0]=>hypertext, [1]=>language, [2]=>programming

	$chars = preg_split('//', 'PHP', 0,PREG_SPLIT_NO_EMPTY);
		print_r($chars); // [0] => P, [1] => H, [2] => P

echo '<br>';























