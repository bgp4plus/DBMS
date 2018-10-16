<?php

  $name="takezaki";
  $email="takezaki@example.com";
  $message="Fight!";
  $answer=new dbmanager;

  $answer->dbconnect();
  $query="insert into answer values(':name',':email',':message');";

  $answer->sql($query);
  $answer->dbrun();

  class dbmanager{

    public function dbconnect(){
      $dbsetting=array(
        "dbname"=>"guestbook",
        "dbhost"=>"localhost",
        "user"=>"root",
        "pass"=>"",
      );

      $this->dbpdo($dbsetting["dbname"],$dbsetting["dbhost"]);
      try{
        $pdo=new PDO($this->$pdoset,$dbsetting["user"],$dbsetting["pass"]);
      }catch(PDOException $e){
        echo "データベース接続エラー";
        exit;
      }
    }

    public function dbpdo($dname,$host){
      $pdoset="mysql:dbname=$dname;dbhost=$host;charset=utf8mb4";
    }

    public function sql($sql){
      $stmt=$pdo->prepare($sql);
      $stmt->bindParam(":name",$name,PDO::PARAM_STR);
      $stmt->bindParam(":email",$email,PDO::PARAM_STR);
      $stmt->bindParam(":message",$message,PDO::PARAM_STR);
    }

    public function dbrun(){
      try{
        $stmt->execute();
        echo "正常に書き込みました";
        exit;
      }catch(PDOException $e){
        echo "書き込み失敗";
        exit;
      }
    }
  }
?>