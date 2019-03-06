<?php
//Підключення до БД
$pdo = new PDO('mysql:host=localhost;dbname=test', $user, $pass);

//Приклад запиту використання підготовленого запиту тупи SELECT
$stmt = $pdo->prepare('SELECT * FROM test_table');
$stmt->execute();

//Приклад запиту без попредньої підготовки
$pdo->query('SELECT * FROM test_table');

//Приклад запиту використання підготовленого запиту тупи INSERT
$stmt = $pdo->prepare('INSERT INTO customer (`firstname`,`lastname`) VALUES (?, ?)');
$stmt->execute(['John', 'Smith']);

//Робота з транзакціями
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->beginTransaction();
    $pdo->exec("insert into staff (id, first, last) values (23, 'Joe', 'Bloggs')");
    $pdo->exec("insert into salarychange (id, amount, changedate) values (23, 50000, NOW())");
    $pdo->commit();

} catch (Exception $e) {
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}