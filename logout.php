<?php
require_once('include/session_config.php');  echo $_SESSION['username'];
  session_unset();
   session_destroy();
   header("location: yasser.php");

?>