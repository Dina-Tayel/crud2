<?php



$connection=mysqli_connect("localhost","root","","dinacrud");
if(!$connection){
    die("Failed Connection : " . mysqli_connect_error());
}
function add($username,$password,$email,$gender){
    $insert="insert into `users` (`username`,`password`,`email`,`gender`) values('$username','$password','$email','$gender')";
    $query=mysqli_query($GLOBALS["connection"],$insert);
    return mysqli_affected_rows($GLOBALS["connection"]);
}
function delete($id){
    $delete="delete from `users` where `id`='$id'";
    $query=mysqli_query($GLOBALS["connection"],$delete);
    return mysqli_affected_rows($GLOBALS["connection"]);
}
function show(){
    $select="select * from `users` " ;
    $query=mysqli_query($GLOBALS["connection"],$select);
    while($row=mysqli_fetch_assoc($query)){
        $data[]=$row;
    }
    return(!empty($data) ? $data : [] ) ;
}
// updateeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee

// function update($array=array($username,$password,$email,$gender)){

    
// }
// end updateeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
function getOneUser($id){
    $select="select * from `users` where `id`='$id'";
    $query=mysqli_query($GLOBALS["connection"],$select);
    $row=mysqli_fetch_assoc($query);
    return $row;
}

function search($key){
    $pattern="%$key%";
    $select="select * from `users` where `username` LIKE '$pattern' " ;
    $query=mysqli_query($GLOBALS["connection"],$select);
    while($row=mysqli_fetch_assoc($query)){
        $data[]=$row;
    }
    return(!empty($data) ? $data : [] ) ;
}

// $connection=mysqli_connect("localhost","root","","dinacrud");
// if(!$connection){
//     die(" Connection Failed : " . mysqli_connect_error());
// }
// function add($username,$password,$email,$gender){
//     $insert="insert into `users` (`username`,`password`,`email`,`gender`) values('$username','$password','$email','$gender')";
//     $query=mysqli_query($GLOBALS["connection"],$insert);
//     return mysqli_affected_rows($GLOBALS["connection"]);

// }
// function delete($id){
//     $delete="delete from `users` where `id` = '$id'";
//     $query=""
// }





?>