<?php

    require_once "NewsDB.class.php";
    $news = new NewDB();

    $id = $news->clearInt(  $_GET["id"]  );

    echo $id;

    if( !$news->deleteNews($id) )
        $errMsg = $errMsg.'<br>'.'Произошла удалении статьи';
    header("Location: news.php");
    exit;
