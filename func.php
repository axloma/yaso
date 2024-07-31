<?php

function isempty($sub,$email,$phone,$msg,$ip,$date){
	$result;
	if(empty($sub) || empty($email) || empty($phone) || empty($msg) || empty($ip) || empty($date) ){
		$result = true;
	}else {
		$result = false;
}
     return $result;
}

function notemail($email){
	$result;
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$result=true;
	}else {
		$result= false;
}
return $result;
}
 
function sndmsg($conn,$sub,$email,$phone,$msg,$date,$ip_address){
	$sql="INSERT INTO messages (sub,email,phone,msg,date,ip_address)
          VALUES(?,?,?,?,?,?);";
		  $stmt = mysqli_stmt_init($conn);
		  if(!mysqli_stmt_prepare($stmt,$sql)){
			  echo "failed to connect to database";
		  }
		  mysqli_stmt_bind_param($stmt,"ssssss",$sub,$email,$phone,$msg,$date,$ip_address);
		  mysqli_stmt_execute($stmt);
		  echo "your msg send correctly";
		  mysqli_stmt_close($stmt);		  
		 header("location: index.php#contactme");
}

function isexist($conn,$username ){
	$sql ="SELECT * FROM yasserlogin WHERE name = ? ;";
	$stmt = mysqli_stmt_init($conn);//TODO INITIALIS statment
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "failed to connect ";
	}
	mysqli_stmt_bind_param($stmt,"s",$username);//TODO bind parameter into the statmen
	mysqli_stmt_execute($stmt);//TODO EXECUTE THE STATMENT
	$data = mysqli_stmt_get_result($stmt);//get the result from the statment and store it in variable
	if($row =mysqli_fetch_assoc($data)){		
		return $row;
	}
	else {
		    $result =false;
			return $result;
	}

	mysqli_stmt_close($stmt);
}

function logyasser($conn,$username,$pass){
	$user = isexist($conn,$username);
	if($user === false){
		echo "this username/email dont exist";
	
	}
	else{
		$password = $user['password'];
		$checkpass = password_verify($pass,$password);//TODO verify hashed password 
		if($pass === $password || $checkpass === true){
			session_start();
			$_SESSION["username"]="yasser";
			//$_SESSION["username"]=$user["username"];
			//$array = array_values($user);
			// $new = implode($user);
			// echo $new;

			// session($user["username"],$user["password"],$user["email"],$user["lang"],$user["favanimal"],$user["favsport"],$user["image"]);
			 header("location:msg.php");

			// echo "start session";

		} 
		
		else {
	    echo "incoreect password";
}

	}
	

}
function logoutyasser(){
	session_unset();
	session_destroy();
header("location:index.php");
}
