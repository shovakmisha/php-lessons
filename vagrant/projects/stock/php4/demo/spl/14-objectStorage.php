<?php

    class Course{
      private $_name;
      public function __construct($name){
        $this->_name = $name;
      }
      public function __toString(){
        return strtoupper($this->_name);
      }
    }

    $courses = new SplObjectStorage();

    $php = new Course('php');
    $xml = new Course('xml');
    $java = new Course('java');

    $courses->attach($php);
    $courses->attach($java);

    var_dump( $courses->contains($php) );
    var_dump( $courses->contains($xml) );
    var_dump( $courses->contains($java) );

    $courses->attach($xml);
    var_dump( $courses->contains($xml) );

    $courses->detach($java);
    var_dump( $courses->contains($java) );

    $titles = [];
    foreach ($courses as $course) {
      $titles[] = (string) $course;
    }
    echo join(', ', $titles);




    // Цей код з теми - ArrayObject - Масив как обєкт. Може вын десь ы э в прикладах, але я вставив його с
    $usersArr = [
        'Вася', 'Петя', 'Иван', 'Маша', 'Джон',
        'Майк', 'Даша', 'Наташа', 'Света'
    ];

    $usersObj = new ArrayObject($usersArr);


    // Добавляем новое значение
    $usersObj->append('Ира');


    //Получаем копию массива
    $usersArrCopy = $usersObj->getArrayCopy();


    // Проверяем, существует ли пятый элемент массива
    if ($usersObj->offsetExists(4)){
    // Меняем значение пятого элемента массива
        $usersObj->offsetSet(4, "Игорь");
    }


    // Удаляем шестой элемент массива
    $usersObj->offsetUnset(5);


    // Получаем количество элементов массива
    echo $usersObj->count();


    // Сортируем по алфавиту
    $usersObj->natcasesort();


    // Выводим данные массива
    for( $it = $usersObj->getIterator(); $it->valid(); $it->next() ){
        echo '<p>';
        echo $it->key() . ': ' . $it->current() . "\n";
        echo '</p>';
    }



    /*
    // Копия массива
    $usersObjCopy = new ArrayObject($usersArrCopy);

    // Выводим данные из копии массива
        for($it = $usersObjCopy->getIterator(); $it->valid();
            $it->next()){
            echo $it->key() . ': ' . $it->current() . "\n";
        }
    ​*/







    /*

    $storage = new SplObjectStorage();

    $object1 = (object) ['param' => 'name'];
    $object2 = (object) ['param' => 'numbers'];

    $storage[$object1] = "John";
    $storage[$object2] = [1, 2, 3];

    foreach($storage as $i => $key){
        echo "Item $i:\n";
        var_dump($key, $storage[$key]);
        echo "<br>";
    }
    */

?>

