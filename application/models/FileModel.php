<?php
class FileModel{
  /* Имя пользователя */
  public $name = '333';
  /* Список пользователей */
  public $list = [];
  /* Текущий пользователь: ассоциативный массив
  *	с элементами role и name для существующего пользователя
  *	или только с элементом name для неизвестного пользователя
  */
  public $user = [];

  public function render($file) {
    /* $file - текущее представление */
    ob_start();
    include($file);
    return ob_get_clean();
  }

  function getUsers($file, $base){
      $handle = fopen($base, "r");
      $contents = fread($handle, filesize($base));
      fclose($handle);
      $this->list = unserialize($contents);
      ob_start();
      include($file);
      return ob_get_clean();
  }

}