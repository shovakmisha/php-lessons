<?php
header("Content-Type: text/html;charset=utf-8");	
	/*$dom = new DOMDocument();
	$dom->load("catalog.xml");
	$root = $dom->documentElement;
    $books = $root->childNodes;

    // -------

    $newbook = $dom->createElement('newbook');
    $newauthor = $dom->createElement('newauthor');
    $newdescription = $dom->createCDATASection('... описание книги ...');

    $newauthor->appendChild($newdescription);

    $newbook->appendChild($newauthor);

    $root->appendChild($newbook);

    $dom->save('catalog.xml');*/

    $sxml = simplexml_load_file("catalog.xml");

    $book = simplexml_load_string("book");

    print_r($book);

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

    //Парсинг. Виведе дані xml
        //foreach ( $books as $book){
        //    if( $book->nodeType == 1 ){
        //        echo '<tr>';
        //            foreach ( $book->childNodes as $item) {
        //                if ($item->nodeType == 1) {
        //                    echo "<td>{$item->textContent}</td>";
        //                }
        //            }
        //        echo '</tr>';
        //    }
        //}

	?>
	</table>
	</body>
</html>