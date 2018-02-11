<!DOCTYPE html>
<html lang='ru'>
<head>
    <title>Простейший PHP-сценарий</title>
    <meta charset='utf-8'>
</head>
<body>
<h1>Здравствуйте!</h1>
<p>
    <?php
    // Вычисляем текущую дату в формате "день.месяц год"
    $dat = date("d.m y");
    // Вычисляем текущее время
    $tm = date("h:i:s");
    # Выводим их
    echo "Текущая дата: $dat года<br />\n";
    echo "Текущее время: $tm<br />\n";
    # Выводим цифры
    echo "А вот квадраты и кубы первых 5 натуральных чисел:<br />\n";
    echo "<ul>\n";
    for ($i = 1; $i <= 5; $i++) {
        echo "<li>$i в квадрате = " . ($i * $i);
        echo ", $i в кубе = " . ($i * $i * $i) . "</li>\n";
    }
    ?>
    </ul>
</p>

<?php

    // Объявляем новый класс.
    class AgentSmith {};
    // Создаем новый объект класса AgentSmith.
    $first = new AgentSmith();
    // Присваиваем значение атрибуту класса.
    $first->mind = 0.123;
    // Копируем объекты.
    $second = $first;
    // Изменяем "разумность" у копии!
    $second->mind = 100;
    // Выводим оба значения.
    echo "First mind: {$first->mind}, second: {$second->mind}"."<br>";

    $arr = array('left' => 'left');

    echo " 444: $arr[left] <br>";


    // ----------------


    $names["Davis"] = "Don";
    $ref = &$dossier["Reeves"]["name"];
    echo $ref[0] ."<br>";
    $nameList[] = "Paul Doyle";
    echo $nameList[0]."<br>";

?>

<?php ## Глобальные переменные в функции.
$monthes = [
    1  => "Январь",
    2  => "Февраль",
    12 => "Декабрь"
];
// Возвращает название месяца по его номеру. Нумерация начинается с 1!
function getMonthName($arr, $n)
{
    //global $monthes;
    return $arr[$n];
}
// Применение.
echo getMonthName($monthes,1), "<br>"; // выводит "Февраль"

?>

<?php ## Вложенные функции.
    function father($a)
    {
        echo $a, "<br />";
        function child($b) {
            echo $b + 1, "<br />";
            return $b * $b;
        }
        return $a * $a * child($a);
        // фактически возвращает $a * $a * ($a+1) * ($a+1)
    }
    // Вызываем функции.
    father(10);
    child(30);
    // Попробуйте теперь ВМЕСТО этих двух вызовов поставить такие
    // же, но только в обратном порядке. Что, выдает ошибку?
    // Почему, спрашиваете? Читайте дальше!
?>


<?php ## Использование call_user_func_array().
// Вывод всех параметров на отдельных строках.
    function myecho(...$str)
    {
        foreach ($str as $v) {
            echo "$v<br />\n"; // выводим элемент
        }
    }
    // То же самое, но предваряет параметры указанным числом пробелов.
    //$planetess = ['111', '222', '333'];
    function tabber($spaces, ...$planets)
    {
        // Подготавливаем аргументы для myecho().
        $new = [];
        foreach ($planets as $planet) {
            $new[] = str_repeat("&nbsp;", $spaces).$planet;
        }
        // Вызываем myecho() с новыми параметрами.
        call_user_func_array("myecho", $new);
    }
    // отображаем строки одну под другой
    tabber(10, "Меркурий", "Венера", "Земля", "Марс");

?>

<?php ## Различия между strtr() и str_replace().
$text = "matrix has you";
$repl = ["matrix" => "you", "you" => "matrix"];

echo "<br /> str_replace(): ".
    str_replace(array_keys($repl), array_values($repl), $text)."<br />";
echo "strtr(): ".
    strtr($text, $repl);

    echo '<br>', mt_rand(3, 99), '<br>';

?>

<?php

    $f = fopen("./info.php", 'r');

    echo $f."<br>";

    echo "fileOwner : ". decbin( fileowner("info.php") ) ."<br>";

    //$xxx = system( mkdir('rrr'));
    //echo $xxx ."<br>";

    $tmpfname = tempnam("./tmp", "FOO")."<br>";
    echo $tmpfname, "<br>" ;

    list ($frac, $sec) = explode(" ", microtime() );
    $time = $frac + $sec;
    echo $time;


?>

</body></html>
