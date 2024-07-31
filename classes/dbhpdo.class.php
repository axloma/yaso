

<?php

class Dbhpdo {

private $hostname = "localhost";
private $username = "root" ;
private $password = "yaso136";
private $dbname  = "mywebd";
//public $conn ;

public function __construct($host,$username,$pass,$dbn){
$this->hostname = $host;
$this->username = $username;
$this->password = $pass;
$this->dbname = $dbn;

}
public function connect(){
   try{
$dsn = 'mysql:host=' . $this->hostname .';dbname='.$this->dbname;//TODO configure the db
$pdo = new PDO($dsn,$this->username,$this->password);//TODO create a pdo connection
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);//TODO create fetch assoc "to create fetch associteve array"
return $pdo;
}catch(TypeError $e){
    echo "ERROR" . $e->getMessage() ;
   }
}

public  function query($query)
{
    $stmt = $this->connect()->query($query) ;
    return $stmt;
    
}


}

?>
