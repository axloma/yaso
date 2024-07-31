<?php 

require_once('include/session_config.php');

?>
<!DOCTYPE html>
<html lan="en">
<head>
 <meta charset="UTF-8">
       <meta name="author" content="yasser">
       <meta name="descreiption" content="my first html course">
       <link rel="shortcut icon" href="image/sec.png">
        <link rel="stylesheet" href="css/yasserstyle.css" >
                <script src="js/jquery-3.7.1.min.js"></script>

<title> <?php echo $title = "yaso" ?></title>
</head>
<body>
<?php 
if(!isset($_SESSION["username"]))
{
?>
<section class="login" >
<fieldset class="yasser_login">
<?php 
$error_list = ["emptyinput","stmtfailed","usernotfound","wrongpass","usernotfoundman"];
if(isset($_GET["error"])){
$error = $_GET["error"];
if(in_array($error,$error_list)){
echo "<h2>ERROR " .$error."</h2>";
}else{
  echo "<h2>ERROR  NOT DEFIENED" ."</h2>";

}
}
?>
<form action="include/logyasser.inc.php" method="post" >
<legend>login </legend>
<p>
<label for="username" >username</label>
<input type="text" name="username" id="username" placeholder="username" autofocus>
</p>
<p>
<label for="pass" >password</label>
<input type="password" name="pass" id="pass" placeholder="password">
</p>
<input type="submit" name="login" value="login">
</form>
<button id="view" onclick="changattr()"> view password </button>

</fieldset>
</section>
<?php }
else{
  echo "<h1>"."hellow ". $_SESSION['username'] ."</h1>". "<br/>" ;
  echo "<p class='par'>". "you r already logged in as ". $_SESSION['username']."</p>". "<br/>"."<br/>" ;  
  ?>
<a href="logout.php"> logout </a>
<a href="index.php"> home </a>
<a href="msg.php">my msg</a>

<?php }
?>
<script>
let view = false;

function changattr(){
let x = $("#pass");

if (view === false){
x.attr("type","text");
view = true;
}
else if (view === true)
{
x.attr("type","password");
view = false;
}
}
</script>
</body>
</html>
