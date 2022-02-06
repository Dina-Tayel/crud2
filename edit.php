<?php
session_start();
require "db.php";
$db=new DB(["localhost","root","","dinacrud"]);
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $row=$db->Select("*","users")->Where("id","=",$id)->GetRow();
}else{
  header("location:index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>update </title>
</head>
<body>
    <div class="container my-5  ">
    <?php if(!empty($_SESSION['errors'])): ?>
            <div class="alert alert-danger">
                    <?php foreach( $_SESSION['errors'] as $error): ?>
                   
                        <p> <?= $error; ?></p>
                   
                    <?php endforeach ; ?>
                    </div>

            <?php endif; session_unset(); ?>
    <form method="POST" action="update.php">
    <div class="mb-3 col-md-4">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text"  name="username" class="form-control" value="<?= $row["username"] ?>">
    </div>
    <div class="mb-3 col-md-4">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" value="<?= $row["password"] ?>">
  </div>
  <div class="mb-3 col-md-4">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" value="<?= $row["email"]?>" >
     </div>
 
  <div class="mb-3 col-md-4">
    <label class="form-check-label" for="exampleCheck1">Your Gender</label>
  </div>
  <div class="mb-3 col-md-4">
    <label class="form-check-label" for="exampleCheck1">Female</label>
    <input type="radio" value="female" <?php if($row['gender']=='female'): ?> checked <?php endif; ?> name="gender" >
  </div>
  <div class="mb-3 col-md-4">
    <label class="form-check-label" for="exampleCheck1">Male</label>
    <input type="radio" value="male"<?php if($row["gender"]=='male'):?> checked <?php endif; ?>  name="gender" >
  </div>
  <div class="mb-3 col-md-4">
    <input type="hidden" name="hidden_name" class="form-control" value="<?= $row["id"]?>" >
     </div>
  <button type="submit" name="update" class="btn btn-primary">update data</button>
</form>
    </div>
    






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>