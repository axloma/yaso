<?php 
require_once('include/new.inc.php');   
require_once('include/session_config.php');
require_once('classes/dbhpdo.class.php');

$connection = new Dbhpdo("localhost","root","yaso136","mywebd");


$sql = "SELECT * FROM messages ORDER BY ID DESC ;";
   if (empty($_SESSION["username"])) {
      header("Location:yasser.php");
   }
   if (isset($_GET['delid'])){
     $id = $_GET['delid'];
     $query = "delete from messages where id = ". (int)$id    ;
     $connection->query($query);
     header("location: msg.php");
   
   }
   if(isset($_POST['logout'])){
    session_unset();
   session_destroy();
    header("location:index.php");
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>msg<?php echo $_SESSION['username'] ?></title>
  <link rel="stylesheet" href="css/table.css">
  <script src="js/jquery-3.7.1.min.js"></script>

</head>
<body>
<div class="menue">
<a href="logout.php" class="menue"> logout </a>
<a href="index.php" class="menue"> home </a>
<a href="yasser.php" class="menue">yasser</a>
</div>
<button>load_new</button>
<form action="" method="post">
<input type="search"  id="search">

</form>
<p id="v" class="p"> value is </p>
<table class="table_style" width="32rem">
<thead >
<tr> 
  <th scope="col">id</td>
  <th scope="col">sub</td> 
  <th scope="col">email</td> 
  <th scope="col">phone</td>
  <th scope="col">msg</td>
  <th scope="col">date</td> 
  <th scope="col">ip_address</td> 
  <th scope="col"> delete </td> 
  <th scope="col"> edit </td> 
  <th scope="col"> view </td> 
</tr>
</thead>
<tbody id="tb">
<?php 
$stmt = $connection->connect()->query($sql);
while($result=$stmt->fetch()) //fetch with pdo
{ 
  ?>
<tr> 
  <!--<th scope="row"></th>-->
  <td><?=$result["id"] ; ?></td> 
  <td><?=$result["sub"]?></td> 
  <td><?=$result["email"]?></td> 
  <td><?=$result["phone"]?></td>
  <td><?=$result["msg"]?></td>
  <td><?=$result["date"]?></td> 
  <td><?=$result["ip_address"]?></td>
  <td><a href =  "<?php 
echo "msg.php"."?delid=" .$result['id']    ?> " class="delete" id="del" > delete </a> </td>
<td><a href ="<?php 
echo "./edite.php"."?id=" .$result['id'] ?>" class="edite" > edite </a> </td>
<td><a href ="<?php 
echo "./viewmsg.php"."?id=" .$result['id'] ?>" class="view"> view </a> </td>
</tr>
<?php }
?>
<script>
$("button").click(function(){
  let s  = document.getElementById("search");
  var LIMITEM = 5 ;
  var id = s.value; 
  if( id == ""){id = 1;}
  console.log("work");
$("#tb").load("load_msg.php",{LIMITEM: LIMITEM , id: id });
$("#value").html(data);
});
//use $selector 
$("input").keyup( function() {
  var datae = $("#search").val();
  // $("#v").html("typing  " + datae);
   $.post("load_msg.php",
           {LIMITEM:5,id:datae},
           function(data,status){
              $("#v").html(data);
           }  
   );

});
</script>

</tbody>
</table>
<script src="new.js"></script>
</body>
</html>