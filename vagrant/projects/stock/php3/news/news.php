<?php
    require_once "NewsDB.class.php";
    $news = new NewDB();

    if( $_SERVER["REQUEST_METHOD"] == "POST" ){
        require_once('save_news.inc.php');
    }

    require_once "get_news.inc.php";
    $posts = $news->getNews();

    $errMsg = "";

?>
<!DOCTYPE>

<html>
<head>
	<title>Новостная лента</title>
	<meta charset=utf-8" />
</head>
<body>

<h1>Последние новости</h1>
<?php
    if($errMsg){
        echo "<h3> $errMsg </h3>";
    }
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    Заголовок новости:<br />
    <input type="text" name="title" /><br />

    Выберите категорию:<br />
    <select name="category">
        <option value="1">Политика</option>
        <option value="2">Культура</option>
        <option value="3">Спорт</option>
    </select>
    <br />

    Текст новости:<br />
    <textarea name="description" cols="50" rows="5"></textarea><br />

    Источник:<br />
    <input type="text" name="source" /><br />

    <br />
    <input type="submit" value="Добавить!" />

</form>

<table border="1" width="1000">
    <tr>
        <th>Заголовок</th>
        <th>Категория</th>
        <th>Описание</th>
        <th>Источник</th>
        <th>Дата публикации</th>
        <th>Удалить новость</th>
    </tr>

<?php

foreach ( $posts as $post ){ ?>

    <tr>
        <td><?php echo $post['title']; ?></td>
        <td><?php echo $post['category']; ?></td>
        <td><?php echo $post['description']; ?></td>
        <td><?php echo $post['source']; ?></td>
        <td><?php echo date('d-m-y', $post['datetime']); ?></td>
        <td><a href="delete_news.inc.php?id=<?php echo $post['id']; ?>">Удалить</a></td>
    </tr>

<?php
}

//echo '<pre>';
//print_r($posts);
//echo '</pre>';

?>

</table>
</body>
</html>