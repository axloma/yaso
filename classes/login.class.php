<?php 
class Login extends dbhpdo {
    protected function getuser($uid, $pwd){
       // $connection = new Dbhpdo("localhost","root","","mywebd");
      // $connection->connect();
        $stmt = $this->connect()->prepare('SELECT password FROM yasserlogin WHERE name = ? ');
        if(!$stmt->execute(array($uid))){
            $stmt = null ;//clear stmt
            header("location: ../yasser.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount() == 0){
            $stmt = null;
            header('location: ../yasser.php?error=usernotfound');
            exit();
        }
        $pwdhashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkpass = password_verify($pwd,$pwdhashed[0]['password']);
        if($checkpass == false){
            $stmt = null;
            header('location: ../yasser.php?error=wrongpass');
            exit();
        }
        elseif($checkpass == true){

            $stmt = $this->connect()->prepare("SELECT * FROM yasserlogin WHERE name = ? AND password = ? ");
           // $hash = password_hash($pwd,PASSWORD_DEFAULT);
            if(!$stmt->execute(array($uid , $pwdhashed[0]['password']))) {
                $stmt = null ;//clear stmt
                header("location: ../yasser.php?error=stmtfailed");
                exit();
            }
           
            if($stmt->rowCount() == 0){
                $stmt = null;
                header('location: ../yasser.php?error=usernotfoundman');
                exit();
            }
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
            session_start();
            $_SESSION['username'] = $user['name'] . $user['id'];
            header('location: ../msg.php');
        }

    }

}