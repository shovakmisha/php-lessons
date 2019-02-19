<pre>
<?php
/*
class Counter{
  private static $c = 0;

  final public static function increment(){
      static $name = 'Vasya';
    return ++self::$c;
  }
}

// Создание экземпляра класса ReflectionMethod
$method = new ReflectionMethod('Counter', 'increment');

// Вывод основной информации
printf(
    "===> %s%s%s%s%s%s%s метод '%s' (который является %s)\n" .
    "     объявлен в %s\n" .
    "     строки с %d по %d\n",
        $method->isInternal() ? 'Встроенный' : 'Пользовательский',
        $method->isAbstract() ? ' абстрактный' : '',
        $method->isFinal() ? ' финальный' : '',
        $method->isPublic() ? ' public' : '',
        $method->isPrivate() ? ' private' : '',
        $method->isProtected() ? ' protected' : '',
        $method->isStatic() ? ' статический' : '',
        $method->getName(),
        $method->isConstructor() ? 'конструктором' : 'обычным методом',
        $method->getFileName(),
        $method->getStartLine(),
        $method->getEndline()
);

    //echo $method->getExtension();

    echo '<br>';
    echo 4444;

// Вывод статических переменных, если они есть
if ($statics= $method->getStaticVariables()) {
  printf("---> Статическая переменная: %s\n", var_export($statics, 1));
}
    // exit;


echo '<br>';
echo '<br>';

// Вызов метода
printf("---> Результат вызова: ");
$result = $method->invoke(null);
echo $result;

*/


// Це вже я своє допишу

    class MyClass
    {

        public function foo(){
            echo 'foo';
        }

    }

    $muObj = new MyClass;

    $reflectionMethod = new ReflectionMethod('MyClass', 'foo');

    $result2 = $reflectionMethod->invoke( new MyClass() );




?>
</pre>