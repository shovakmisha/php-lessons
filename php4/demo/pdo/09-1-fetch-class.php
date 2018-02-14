<?php
class User{

  public $id;
  public $email;
  public $name;

  function __construct()
  {
      $this->id=0;
      $this->email="test@mail.com";
      $this->name='Deny';
  }

    public function nameToUpper(){
    return strtoupper($this->name);
  }
}


  $db = new PDO("sqlite:users.db");
  $sql = "SELECT * FROM user";
  $stmt = $db->query($sql);

  // $obj = $stmt->fetchObject("User");

  $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "User");
  $obj = $stmt->fetch(PDO::FETCH_ASSOC);



    var_dump($obj);


  echo $obj->id.'<br>';
  echo '<br>';
  echo $obj->nameToUpper().'<br>';
  echo $obj->email.'<br>';

  echo 444;

  $db = null;
