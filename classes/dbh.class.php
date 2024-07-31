<?php

class Dbh {

public $hostname;
public $username ;
public $password ;
public $dbname ;
public $conn ;

public function __construct($host,$username,$pass,$dbn){
$this->hostname = $host;
$this->username = $username;
$this->password = $pass;
$this->dbname = $dbn;

}
public function connect(){
try{
    $this->conn = mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname);
    if(mysqli_connect_errno()){
        $msg = "failed to connect ". mysqli_connect_error() . mysqli_connect_errno();
        echo $msg;
        exit($msg);
   }
   return $this->conn;
}
catch(TypeError $e){
    echo "ERROR" . $e->getMessage() ;
   }
}


}
