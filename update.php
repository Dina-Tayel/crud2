<?php
session_start();
if(isset($_POST['update'])){
    $username=trim(stripslashes(htmlspecialchars($_POST['username'])));
    $password=trim(stripslashes(htmlspecialchars($_POST['password'])));
    $email=trim(stripslashes(htmlspecialchars($_POST['email'])));
    $gender=trim(stripslashes(htmlspecialchars($_POST['gender'])));
    $id=trim(stripslashes(htmlspecialchars($_POST['hidden_name'])));
    // echo $id;
    // vaildationEmail -requierd - valid email  - length<255 (unique in mysql)
    $errors=[];
    if(empty($username)){
        $errors[]="Username is requierd";
        }elseif(is_numeric($username)){
            $errors[]="Username must be string";
        }elseif(strlen($username)>200){
            $errors[]="Please enter username with length less than 200 char";
        }
    if(empty($email)){
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

    // print_r($errors);
    if(empty($errors)){
       
        require "db.php";
        $db=new DB(["localhost","root","","dinacrud"]);
        $data=["username"=>$username,"email"=>$email,"password"=>$password,"gender"=>$gender];
        $update=$db->update("users",$data)->Where("id","=",$id)->excute();
        // print_r($update);die;
         header("location:index.php");
        
        
    }
    else{
        $_SESSION['errors']=$errors;
        header("location:edit.php?id=$id");
    }
    
}else {
    header("location:index.php");
}