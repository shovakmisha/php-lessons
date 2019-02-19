<?php

  require "_header.php";

    $curl = curl_init();

    echo HOST_NAME;

    curl_setopt($curl, CURLOPT_URL, HOST_NAME . "test.php");

    curl_exec($curl);

    curl_close($curl);


    // echo CURLOPT_URL;