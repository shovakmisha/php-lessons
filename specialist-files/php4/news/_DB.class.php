<?php
class DB{
  private $_db;
  const DB_NAME = 'news.db';
  function __construct(){
    if(is_file(self::DB_NAME)){
      $this->_db = new PDO(self::DB_NAME);
    }else{
      $this->_db = new PDO(self::DB_NAME);
      $sql = "CREATE TABLE msgs(
                              id INTEGER PRIMARY KEY AUTOINCREMENT,
                              title TEXT,
                              category INTEGER,
                              description TEXT,
                              source TEXT,
                              datetime INTEGER
                          )";
      $this->_db->exec($sql) or $this->_db->errorCode();
      $sql = "CREATE TABLE category(
                                  id INTEGER PRIMARY KEY AUTOINCREMENT,
                                  name TEXT
                              )";
      $this->_db->exec($sql) or $this->_db->errorCode();
      $sql = "INSERT INTO category(id, name)
                  SELECT 1 as id, 'Политика' as name
                  UNION SELECT 2 as id, 'Культура' as name
                  UNION SELECT 3 as id, 'Спорт' as name";
      $this->_db->exec($sql) or $this->_db->errorCode();
    }
  }
  function __destruct(){
    unset($this->_db);
  }
  function query($sql){
    return $this->_db->query($sql);
  }
  function exec($sql){
    return $this->_db->exec($sql);
  }
  function fetch($data, $type=FETCH_BOTH){
    return $data->fetch($type);
  }
  function getError(){
    return $this->_db->errorCode();
  }
  function escape($data){
    return $this->_db->quote($data);
  }	
}
