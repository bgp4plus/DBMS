<?php

  $name="takezaki";
  $email="takezaki@example.com";
  $message="Fight!";
  $answer = array(
    "name" => $name, "email" => $email, "message" => $message,
  );
  $dbmanager=new dbmanager();
  $dbmanager->insertAnswer($answer);



  class dbmanager{
    private $mypdo;

    private $dbsetting=array(
      'dbname'=>'guestbook',
      'dbhost'=>'localhost',
      'user'=>'root',
      'pass'=>'',
    );

    private function dbconnect(){

      $pdoset = $this->dbpdo($this->dbsetting["dbname"],$this->dbsetting["dbhost"]);
      try{
        $this->mypdo=new PDO($pdoset,$this->dbsetting["user"],$this->dbsetting["pass"],array(PDO::ATTR_EMULATE_PREPARES => false));
      }catch(PDOException $e){
        echo "データベース接続エラー<br>".$e->getMessage()."<br>";
        throw $e;
      }
    }

    private function dbdisconnect() {
      unset($this->mypdo);
    }

    private function dbpdo($dbname,$dbhost){
      $pdoset="mysql:dbname=$dbname;dbhost=$dbhost;charset=utf8mb4";
      return $pdoset;
    }

    public function sql($sql,$answer){
      $stmt=$this->mypdo->prepare($sql);
      $stmt->bindParam(":name",$answer["name"],PDO::PARAM_STR);
      $stmt->bindParam(":email",$answer["email"],PDO::PARAM_STR);
      $stmt->bindParam(":message",$answer["message"],PDO::PARAM_STR);
      return $stmt;
    }

    public function insertAnswer ($answer) {
      try {
        $this->dbconnect();
        $query="insert into test values(:name,:email,:message);";
        $stmt = $this->sql($query,$answer);
        $stmt->execute();
        echo "正常に書き込みました。";
      } catch (PDOException $e) {
        echo "error<br>".$e->getMessage();
        throw $e;
      }
    }
  }
?>