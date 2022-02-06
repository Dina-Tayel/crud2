<?php 
session_start();
if(isset($_POST["add"])){
$username=trim(stripslashes(htmlspecialchars($_POST['username'])));
$password=trim(stripslashes(htmlspecialchars($_POST['password'])));
$email=trim(stripslashes(htmlspecialchars($_POST['email'])));
$gender=trim(stripslashes(htmlspecialchars($_POST['gender'])));

// validation username
$errors=[];
if(empty($username)){
$errors[]="Username is requierd";
}elseif(is_numeric($username)){
    $errors[]="Username must be string";
}elseif(strlen($username)>200){
    $errors[]="Please enter username with length less than 200 char";
}
// vaildationEmail -requierd - valid email  - length<255 (unique in mysql)

if( empty($email)){
    $errors[]='email is requierd ! ' ;
    }elseif( ! filter_var($email , FILTER_VALIDATE_EMAIL)){
    $errors[]= 'email is not valid !';
    }elseif(strlen($email)>255){
    $errors[]='email must be less than 255 characters ' ;
    }

    // vaildationPassword -requierd -password  - length<255
    if(empty($password)){
    $errors[]='password is requierd !' ;
    }elseif(strlen($password)>64){
    $errors[]='password must be less than 64 characters ' ;
    }elseif(is_numeric($password)){
    $errors[]="Password must be string";
    }

    if(empty($gender)){
        $errors[]="gender is requierd" ;
    }

    if(empty($errors)){
        require "db.php";
        $db=new DB(["localhost","root","","dinacrud"]);
        $data=["username"=>$username,"email"=>$email,"password"=>$password,"gender"=>$gender];
        $insert=$db->insert("users",$data)->excute();
        if($insert==1){
            // print_r($insert);die;
            header("location:index.php");
        }
        
    }else{
        $_SESSION['errors']=$errors;
        header("location:add-user.php");
    }






}else{
    header("location:add-user.php");
}