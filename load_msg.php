<?php
require_once('include/new.inc.php');   
require_once('classes/dbhpdo.class.php');

$LIMITEM = $_POST["LIMITEM"];
$id =  $_POST["id"];
$connection = new Dbhpdo("localhost","root","yaso136","mywebd");
$sql = "SELECT *  FROM messages where email REGEXP '$id'  ORDER BY ID DESC LIMIT $LIMITEM ;";

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