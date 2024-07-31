<?php
/*
class NewClass{
//Proerties and methods 
    //create public property 
    public $info = "all now";

}
//instintiate class
$object = new NewClass;
//use var_dump() function to get all data of object
var_dump($object);
*/
spl_autoload_register('myload');

function myload($className){
    $path = "classes/"; //TODO this is the name of path hold all classes
    $extension = ".class.php";//TODO this is the extension name of file
    $fullPath = $path . $className . $extension ;
    
    include_once $fullPath;
    
    
    }







