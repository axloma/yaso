<?php
$db_server="localhost";
$db_username="root";
$db_pass="yaso136";
$db_name="mywebd";
//TODO creat a connection to database and store the connection in $variable
$conn = mysqli_connect($db_server,$db_username,$db_pass,$db_name);
//TODO close the connection 
// mysqli_close($conn);


/*

<?php
$db_server="localhost";
$db_username="root";
$db_pass="";
$db_name="mywed";
define("db_server","localhost");
define("db_username","root");
define("db_pass","");
define("db_name","mywebd");




//$conn = mysqli_connect( $db_server,  $db_username,$db_pass,$db_name);

function connect(){
//TODO creat a connection to database and store the connection in $variable
$conn = mysqli_connect( db_server, db_username,db_pass,db_name);
if (isset($conn)){

return $conn;

}else{
confirm_connection();

//TODO close the connection 
//mysqli_close($conn);
return confirm_connection();
}
}
function confirm_connection(){
if(mysqli_connect_error()){
    $msg = "failed to connect " . mysqli_connect_errno() . ';' ;
    //echo $msg;
    exit($msg);
}

}





*/