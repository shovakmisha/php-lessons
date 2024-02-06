<HTML>
<HEAD>
<TITLE>fopen</TITLE>
</HEAD>
<BODY>
<?php
	// $myFile = fopen("data.txt", "r") or die("Не могу открыть файл");
	// echo 'Файл успешно открыт для чтения'; echo "<br>";
	// fclose($myFile);
	// echo 'Файл закрыт';

    //$myFile = fopen("es_ES.csv", "r") or die("Не могу открыть файл");
    //echo 'Файл успешно открыт для чтения'; echo "<br>";


    // read each line into an array
    //while (($data = fgetcsv($myFile, "/n")) !== false) {
    //    // we need to determine what column the "sku" is; this will identify
    //    // the "unique" rows
    //    $i = 1;
    //    foreach ($data as $index) {
//
    //        echo $i++ ." ".$index;
    //        echo "<br>";
    //        //$i++;
    //    }
    //    // write this line to the file
    //    // fputcsv($saveHandle, $data);
    //    // if the sku has been seen, skip it
    //    // if (isset($skus[$data[$skuIndex]])) continue;
    //    //  $skus[$data[$skuIndex]] = true;
    //    // write this line to the file
    //    // fputcsv($saveHandle, $data);
    //}

    //$baseCSV = fgetcsv('es_ES.csv', 999955);//Складываем строки из CSV файла в масив
//
    //$arr = [];
    //foreach($baseCSV as $itemBaseCSV){
    //   //  $arrLineCsv = explode(";", $itemBaseCSV);//Формируем масив из отдельной строки по разделителю ;
    //    //$arrUniqFinish[$arrLineCsv[0].";".$arrLineCsv[1].";".$arrLineCsv[2].";".$arrLineCsv[3].";".$arrLineCsv[4].";".$arrLineCsv[5].";".$arrLineCsv[6].";".$arrLineCsv[7]] = $arrLineCsv[5];//В новый масив забиваем всю строку как ключ, а елемент масива, по которому фильтруем на дубли, как значение
//
    //   //  $arrUniqFinish = array_unique($arrLineCsv);
//
    //    echo 5;
    //    echo "<br>";
    //}




 //$translate = fopen("text.txt", 'w') or die('die');
 //fwrite($translate, '9s\n');




// fputcsv($translate, 's\n');


    $arr = [];

    $row = 1;
    if (($handle = fopen("es_ES.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
            $num = count($data);
            // echo "<p> $num полей в строке $row: <br /></p>\n";
            $row++;
            for ($c=0; $c < $num; $c++) {
                // echo $data[$c] . "<br />\n";
                $arr[] = $data[$c];
            }
        }
        fclose($handle);

    }


echo count(array_unique($arr));

    // echo "<pre>";
    // print_r( array_unique($arr));
    // echo "/<pre>";



    $translate = fopen("text.csv", 'w') or die('die');
    //fwrite($translate, '9s\n');

    $newArray = [];

    foreach (array_unique($arr) as $str){
        $newArray = $newArray[$str] = $str;
        // fputcsv($translate, $newArray);

        // print_r($newArray);

        $newArray = [];
    }



    // $arrUniqFinish = array_unique($arrUniqFinish);//Фильтруем дубли с помощью функции array_unique.

    //foreach($arrUniqFinish as $keyArr => $valueArr){
    //    $finishSavedCsv[] = $keyArr;//Забиваем в новый масив значения которые берем с ключей масива $arrUniqFinish, который в свою очередь уже чистый от дублей по признаку 5 столбца (счет от 0)
    //
    //}

    // file_put_contents('base.csv', implode("\n", $finishSavedCsv))//Перезаписываем CSV файл с уникальными строками

    // fclose($myFile);
    // echo 'Файл закрыт';

	
?>
</BODY>
</HTML>