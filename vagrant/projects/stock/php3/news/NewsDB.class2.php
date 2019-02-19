<?php

    require_once "INewsDB.class.php";

    class NewDB implements INewsDB{
        const DB_NAME = "../../new.db";
        private $_db = null;

        function __get($name)
        {
            // TODO: Implement __get() method.
            if($name == "db"){
                return $this->_db;
            }
            else{
                throw new Exception(" Unknown name ");
            }
        }

        function __construct()
        {
            $this->_db = new SQLite3(self::DB_NAME);
            if( filesize(self::DB_NAME) == 0 ){

                $sql = "CREATE TABLE msg(
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        title TEXT,
                        category INTEGER,
                        description TEXT,
                        source TEXT,
                        datetime INTEGER
                    )";
                $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
                $sql = "CREATE TABLE category(
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        title TEXT,
                        category INTEGER,
                        description TEXT,
                        source TEXT,
                        datetime INTEGER
                    )";
                $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
                $sql = "INSERT INTO category(id, name)
                        SELECT 1 as id, 'Politic' as name
                        UNION SELECT 2 as id, 'Culture' as name
                        UNION SELECT 3 as id, 'Sport' as name ";
                $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
            }
        }

        function __destruct()
        {
            // TODO: Implement __destruct() method.
            unset($this->_db);
        }

        function saveNews($title, $category, $description, $source){

        }

        function getNews(){

        }

        function deleteNews($id){

        }

    }

    $new = new NewDB();
    echo 4;