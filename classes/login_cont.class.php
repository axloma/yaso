<?php 
class Login_cont extends Login {
private $username;
private $pwd;
public function __construct($uid , $pwd){
    $this->username = $uid;
    $this->pwd = $pwd;
}
public function logyaso(){
    if($this->emptyInput()==false){
        header("location: ../yasser.php?error=emptyinput");
        exit();
    }
    $this->getuser($this->username,$this->pwd);
}
private function emptyInput(){
      $result=false;
    if(empty($this->username)||empty($this->pwd)){
        $result = false ;
    }
    else{
        $result = true;
    }
    return $result;
}

}





