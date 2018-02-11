<?php
    $link = mysqli_connect('localhost', 'root', '123', 'web')
            or die('Error dureng connect to db web');

    // Якщо помилка при зєднанні. Але наскільки бачу скріпт і так не іде далі, якщо при підключенні є оператор or як тут вверху
    if( !$link ){
        echo mysqli_connect_errno();
        echo "<br>";
        echo mysqli_connect_error();
    }

    // mysqli_select_db($link, 'some-else-base'); // вибере іншу базу. тобто не треба перепідключатись, достатьо вказати лінку на попередню підключену базу


    //$name = 'Иванов Иван И\'ванович';

    //$name = mysqli_real_escape_string($link, $name);

    //$sql = "SELECT * FROM teachers WHERE NAME = '$name'";
    $sql = "INSERT INTO teachers (name, addr, phone) 
            VALUES('Myname', 'center', '09777777')";

    echo $sql;

    echo mysqli_error($link);

    $result = mysqli_query($link, $sql);

    echo "<br />";

    if( $result ){
        echo 3;
    }else{
        echo mysqli_error($link);
    }

    //while ( $row = mysqli_fetch_row($result) ){
    //    print_r( $row );
    //    echo "<br />";
    //}



    mysqli_close($link);

?>