<?php
header("Content-Type: text/html;charset=utf-8");

// Создание парсера
   $sax = xml_parser_create('utf-8');

// Назначение обработчиков начальных и конечных тегов
    function onStart($parser, $tag, $attributes){
        if( $tag != 'CATALOG' and $tag != 'BOOK' )
            echo '<td>';

        if( $tag == 'BOOK' )
            echo '<tr>';
    }

//  Назначение обработчика текстового содержимого
    function onEnd($parser, $tag){
        if( $tag != 'CATALOG' and $tag != 'BOOK' )
            echo '</td>';

        if( $tag == 'BOOK' )
            echo '</tr>';
    }

// Функция обработчик начальных тегов
    function onText($parser, $text){
        echo $text;
    }

// Функция обработчик закрывающих тегов
    $x= xml_set_element_handler($sax, 'onStart', 'onEnd');

// Функция обработчик текстового содержимого
    xml_set_character_data_handler($sax, 'onText');

	
?>
<html>
	<head>
		<title>Каталог</title>
	</head>
	<body>
	<h1>Каталог книг</h1>
	<table border="1" width="100%">
		<tr>
			<th>Автор</th>
			<th>Название</th>
			<th>Год издания</th>
			<th>Цена, руб</th>
		</tr>
	<?php
		//Парсинг
        $x = xml_parse( $sax, file_get_contents('catalog.xml') )
	?>
	</table>
	</body>
</html>