<?php
require_once('../app/config/config.php');
  class database {
    private $host=DB_HOST;
    private $db_name=DB_NAME;
    private $user=DB_USER;
    private $pass=DB_PASS;
    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
      $dbsn='mysql:host='.$this->host.";dbname=".$this->db_name;
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );
      try {
        $this->dbh=new PDO($dbsn,$this->user,$this->pass,$options);
        $this->dbh->query("SET NAMES utf8");
        $this->dbh->query("SET CHARACTER SET utf8");
      } catch (PDOException $e) {
        $this->error=$e->getMessage();
        echo $this->error;
      }

    }
    public function query($sql){
      $this->stmt = $this->dbh->prepare($sql);
    }
    public function bind($param,$value){
      $this->stmt->bindparam($param,$value);
    }
    public function execute(){
      $this->stmt->execute();
    }
  public function result_set(){
  $this->execute();
  return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function single(){
  $this->execute();
  return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function row_count(){
  return $this->stmt->rowCount();
  }
  
  public function select($sql,$array=[],$num=1){
    $this->query("SELECT * FROM ".$sql);
    foreach ($array as $key => $value) {
      $this->bind("$key",$value);
    }
    $this->execute();
    if ($num==0) {
      return $this->single();
    }
    else {
      return $this->result_set();
    }
  }

  public function select_spechial($x,$sql,$array=[],$num=1){
    $this->query("SELECT $x FROM ".$sql);
    foreach ($array as $key => $value) {
      $this->bind("$key",$value);
    }
    $this->execute();
    if ($num==0) {
      return $this->single();
    }
    else {
      return $this->result_set();
    }
  }

  public function insert($sql,$array=[]){
      $this->query("INSERT INTO $sql");
      foreach ($array as $key => $value) {
        $this->bind("$key",$value);
      }
      $this->execute();
  }

  public function get_last_inserted_id($table_name){
        $x='MAX(id)';
        return ($this->select_spechial($x,$table_name,[],0)['MAX(id)']);
  }

  public function update($table,$sql,$array=[]){
    $this->query("UPDATE $table SET $sql");
    foreach ($array as $key => $value) {
      $this->bind("$key",$value);
    }
    $this->execute();
  }

  public function delete($sql,$array=[]){
    $this->query("DELETE FROM $sql");
    foreach ($array as $key => $value) {
      $this->bind("$key",$value);
    }
    $this->execute();
  }

}
 ?>
