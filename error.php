<?php    
    // $error = $_GET["error"];
if(isset($_GET["error"])){
    if($_GET["error"]=="invalidusername")
    {
        echo "<h2>make sure it's right email</h2>" ;
    }
    if($_GET["error"]=="failed r empty")
    {
        echo "<h2>make sure u dnt missing field plz </h2>" ;
    }
    if($_GET["error"]=="success" )
    {
        echo "<h2>thank you for contact </h2>" ;
    }
    
}
else{
    echo  '<h2>send msg</h2> '  ;
}
?>