<?php

    $title = $news->clearStr($_POST["title"]);
    $category = $news->clearInt($_POST["category"]);
    $description = $news->clearStr($_POST["description"]);
    $source = $news->clearStr($_POST["source"]);

    if( $title && $category && $description && $source ){
        if( !$news->saveNews($title, $category, $description, $source) ){
            $errMsg = 'Произошла ошибка при добавлении товара в каталог';
        }else{
            header("Location: news.php");
            exit;
        }
    }else{
        $errMsg = 'Заполните все поля';
    }
