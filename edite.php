<?php 
echo "<h1>hi edit</h1>";
require_once("dbconn.php");
require_once("func.php");
$id = $_GET['id'];
echo $id;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/style.css">
    </head>
    <title>Document</title>
<body>
    <div class="snd">
    <form method="POST" action="edite.php?id=<?php echo $id?>">
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

   

//    $id = '';
//    if (isset($_GET['id'])){
//     $id = $_GET['id'];
// }
  // $id = $_GET['id'];

    $query = "select * from messages where id = ". (int)$id    ;
    $data = mysqli_query($conn,$query);
   // header("location: msg.php");
   while($result=mysqli_fetch_assoc($data)) {
 
    ?>
 
<input type="text" name="sub" id="sub" placeholder="subject" required value=<?=$result["sub"]?>>
<input type="text" name='email' id="email" placeholder=" Enter your Email" autocomplete='off' required value=<?=$result["email"]?>>
<input type="text"  name="phone" id="phone" placeholder="YOUR PHONE" autocomplete="off" required value=<?=$result["phone"]?>>
<textarea name="msg" id="msg" cols="30" rows="10"  placeholder="your msg" required ><?=$result["msg"]?></textarea >
<input type="submit" value="submit" id="submit" name="submit"/>

<?php }
if (isset($_POST['submit'])){
    $sub = $_POST['sub'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = htmlspecialchars($_POST['msg']);
    $id = $_GET['id'];
    // update messages SET sub = "no" , email = "new@mail.com" where id =28 ;
    //echo $id;
    //$query = " UPDATE messages SET ". "sub='" . $sub ."',"."email='". $email. "',"."phone='". $phone. "'"."WHERE id='".  $id. "'";

   $query = " UPDATE messages SET sub = '$sub' , email='$email' , phone='$phone' , msg='$msg' WHERE id='$id' ";
//    $query .= "sub='" . $sub ."',";
//    $query .= "email='". $email. "',";
//    $query .= "phone='". $phone. "'";
//    $query .= "WHERE id='".  $id. "'" ;

   $updated = mysqli_query($conn,$query);
   echo $id;
   if($updated){
    header("location: msg.php");
 //   header("location: edite.php?id=$id");
//    echo $query;

   }
}
?>
</form>
</div>

</body>
</html>