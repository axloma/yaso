const del = document.querySelectorAll(".delete");
var sure = false ;

del.forEach(link => {
  link.addEventListener("click", (e)=>{
sure = window.confirm("ARE U REALLY SURE ");
if(sure == true ){
alert("warnning msg has been deleted");
//e.preventDefault = false;

  
}
else{
  //
  e.preventDefault();


 //window.location.href="msg.php" ;
 alert("warnning msg not deleted");
 // window.stop();
  //x =   alert("warnning msg not deleted");
  // window.location.href = "yasser.php" ;
// window.location.replace("msg.php");
}
});
});