<?php
if(isset($_POST['login'])){

    $username = htmlspecialchars($_POST["username"]);
    $pass = htmlspecialchars($_POST["pass"]);

include "../classes/dbhpdo.class.php";
include "../classes/login.class.php";
include "../classes/login_cont.class.php";

$login = new Login_cont($username,$pass);

$login->logyaso();

header('location: ../msg.php');

}