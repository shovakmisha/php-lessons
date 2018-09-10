<?php




// array to hold all unique lines
$lines = array();

// array to hold all unique SKU codes
$skus = array();

// index of the `sku` column
$skuIndex = -1;

$saveHandle = fopen("/var/www/html/test/es_US.csv") or die('888');

// open the "save-file"
if ($saveHandle) {
echo 999;
    // read each line into an array
    //while (($data = fgetcsv($readHandle, 8192000, "/n")) !== false) {
    //    // we need to determine what column the "sku" is; this will identify
    //    // the "unique" rows
    //    foreach ($data as $index) {
    //        echo $index;
    //    }
    //    // write this line to the file
    //    // fputcsv($saveHandle, $data);
    //    // if the sku has been seen, skip it
    //    // if (isset($skus[$data[$skuIndex]])) continue;
    //    //  $skus[$data[$skuIndex]] = true;
    //    // write this line to the file
    //    // fputcsv($saveHandle, $data);
    //}
    //fclose($saveHandle);
}










?>