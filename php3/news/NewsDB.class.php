<?php

require_once "INewsDB.class.php";

class NewDB implements INewsDB{
    const DB_NAME = "../../new.db";
    private $_db = null;

    const SELF_HOST = 'http://localhost/php3';

    const RSS_NAME = 'rss.xml';
    const RSS_TITLE = 'Последние новости';
    const RSS_LINK = SELF_HOST.'/news/news.php';

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
            try{
                $sql = "CREATE TABLE msg(
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        title TEXT,
                        category INTEGER,
                        description TEXT,
                        source TEXT,
                        datetime INTEGER
                    )";
                if( !$this->_db->exec($sql) ){
                    throw new Exception( $this->_db->lastErrorMsg() );
                }

                $sql = "CREATE TABLE category(
                            	id INTEGER,
                            	name TEXT
                            )";
                if( !$this->_db->exec($sql) ){
                    throw new Exception( $this->_db->lastErrorMsg() );
                }

                $sql = "INSERT INTO category(id, name)
                              SELECT 1 as id, 'Политика' as name
                        UNION SELECT 2 as id, 'Культура' as name
                        UNION SELECT 3 as id, 'Спорт' as name";
                if( !$this->_db->exec($sql) ){
                    throw new Exception( $this->_db->lastErrorMsg() );
                }
            }catch (Exception $e){
                 // $e->getMessage();
                 echo "error";
            }

        }
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
        unset($this->_db);
    }

    function saveNews($title, $category, $description, $source){
        $dt = time();
        $sql ="INSERT INTO msg(
                            title,
                            category,
                            description,
                            source,
                            datetime
                            )
                      VALUES (
                           '$title',
                            $category,
                           '$description',
                           '$source',
                            $dt
                      )";
        // щоб можна було провірити. Якщо щось не то по поверне фолсе, або щось в тому роді

        $res = $this->_db->exec($sql);
        if(!$res) return false;

        $this->createRss();
        return true;
    }



    private function db2Arr($data){
        $arr = [];
        while ( $row = $data->fetchArray(SQLITE3_ASSOC) ){
            $arr[] = $row;
        }

        return $arr;

    }

    function getNews(){
        $sql = "SELECT msg.id as id, 
                       title, 
                       category.name as category, 
                       description, 
                       source, 
                       datetime
                FROM msg, category
                WHERE category.id = msg.category
                ORDER BY msg.id DESC";

        $res = $this->_db->query($sql);

        if( !$res )
            return false;

        return $this->db2Arr($res);
    }

    function deleteNews($id){
        $sql = "DELETE FROM msg WHERE id = $id";
        $res = $this->_db->query($sql);
        if( !$res )
            return false;

        return true;
    }

    function clearStr($data){
        $data = strip_tags($data);
        return $this->_db->escapeString($data);
    }

    function clearInt($data){
        return abs((int)$data );
    }

    private function createRss(){
        // створюю скелет rss
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;

        $rss = $dom->createElement('rss');
        $dom->appendChild($rss);
        $version = $dom->createAttribute('version');
        $version->value = '2.0';
        $rss->appendChild($version);

        $chanel = $dom->createElement('chanel');
        $rss->appendChild($chanel);

        $title = $dom->createElement('title',RSS_TITLE);
        $link = $dom->createElement('link',RSS_LINK);
        $chanel->appendChild($title);
        $chanel->appendChild($link);

        // заповнюю RSS
        if( !$rssNews = $this->getNews() ) return false;

         echo '<pre>';
         var_dump($rssNews);
         echo '</pre>';

        foreach ( $rssNews as $rssNew ){

            $item = $dom->createElement('item');

            $title = $dom->createElement('title',$rssNew['title']);
            $item->appendChild($title);

            $description = $dom->createElement('description');
            $descriptionText = $dom->createCDATASection($rssNew['description']);
            $description->appendChild($descriptionText);
            $item->appendChild($description);

            $link = $dom->createElement('link', '#');
            $item->appendChild($link);

            $pubDate = $dom->createElement('pubDate', date('r', $rssNew['datetime']));
            $item->appendChild($pubDate);

            $category = $dom->createElement('category.',$rssNew['category']);
            $item->appendChild($category);

            $chanel->appendChild($item);

        }

        $dom->save(self::RSS_NAME);

        return $dom;

    }

}
