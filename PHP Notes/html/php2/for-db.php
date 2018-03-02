<?php
    $link = mysqli_connect('localhost', 'root', '', 'web')
            or die('Error dureng connect to db web');

    $sql = "SELECT * FROM teachers 
            WHERE id=0";

    //echo $sql;

    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_row($result);

    print_r($row);

    mysqli_close($link);


?>