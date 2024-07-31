<?php 
require_once('include/session_config.php');

$id = $_GET['id'];
if (isset($_GET['delid'])){
  $id = $_GET['delid'];
  $query = "delete from messages where id = ". (int)$id  ;

  header("location: msg.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="viewstyle.css"> -->
    <link rel="stylesheet" href="css/table.css">

    <link rel="stylesheet" href="css/styleview.css">

</head>
<body>
<div class="menue_view">
<a href="msg.php" class="menue"> msg </a>
<a href="index.php" class="menue"> home </a>
<a href="yasser.php" class="menue">yasser</a>
</div>
<div class="content">
  <div class="head">
    <div class="div">id</div>
    <div class="div">subject</div>
    <div class="div">email</div>
    <div class="div">phone</div>
    <div class="div">message</div>
    <div class="div">date</div>
    <div class="div">ip</div>
    <div class="div">delete</div>
    <div class="div">view</div>
  </div>
  <?php
//fetch data with pdo 
require_once('include/new.inc.php');
require_once('classes/dbhpdo.class.php');

$connection = new Dbhpdo("localhost","root","yaso136","mywebd");
$sql = "SELECT * FROM messages WHERE id = ? ";
$stmt = $connection->connect()->prepare($sql);
$stmt->execute([$id]);
$row = $stmt->fetchAll();
foreach($row as $result){
  ?>
 
  <div class="data">
    <div class="div"><?=$result["id"] ; ?></div>
    <div class="div"><?=$result["sub"]?></div>
    <div class="div"><?=$result["email"]?></div>
    <div class="div"><?=$result["phone"]?></div>
    <div class="div"><p><?=$result["msg"]?></p></div>
    <div class="div"><?=$result["date"]?></div>
    <div class="div"<?=$result["ip_address"]?>></div>
    <div class="div"><a href =  "<?php echo "msg.php"."?delid=" .$result['id'] ?> " class="delete" id="del" > del </a> </div>
    <div class="div"><a href = "<?php echo "edite.php"."?id=" .$result['id']  ?>" class="edite"> edit </a> </div>
  </div>

</div>
<script src="new.js"></script>

</body>
</html>
<?php }?>
