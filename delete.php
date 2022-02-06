<?php
require "db.php";
$db=new DB(["localhost","root","","dinacrud"]);
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $delete=$db->Delete("users")->Where("id","=","$id")->excute();
    // print_r($delete);
    header("location:index.php");
    
}
else{
    header("location:index.php");
}






?>