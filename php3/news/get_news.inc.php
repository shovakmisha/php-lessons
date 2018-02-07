<?php

    if( !$news->saveNews() ){
        $errMsg = $errMsg.'<br>'.'Произошла ошибка при выводе новостной ленты';
    }