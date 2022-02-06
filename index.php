<?php
require "db.php";
$db=new DB(["localhost","root","","dinacrud"]);
if(isset($_GET['keyword'])){
    $keyword=$_GET['keyword'];
   $rows=$db->Select("*","users")->search("username",$keyword)->GetRows();
}else{
    $rows=$db->Select("*","users")->GetRows();
}

// echo "<pre>";
// print_r($rows);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD</title>
</head>
<body>


<div class="container">

<form method="GET" action="index.php">
<div class="my-3 col-md-4">
    <input type="text"  name="keyword" class="form-control" placeholder="enter username">
    <input class="btn btn-primary mt-1" type="submit" name="search" value="Search">
    </div>

</form>

    <button class="btn btn-primary my-3" type="submit" name="add">
        <a class="text-light text-decoration-none" href="add-user.php">Add New user</a>
    </button>


<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">username</th>
      <th scope="col">password</th>
      <th scope="col">email</th>
      <th scope="col">gender</th>
      <th colspan="2" scope="col">operation</th>
    </tr>
  </thead>
  <tbody>
      <?php if(!empty($rows)): ?>
        <?php foreach($rows as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['password'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['gender'] ?></td>
                <td>
                    <button class="btn btn-primary">
                        <a href="edit.php?id=<?= $row['id'] ?>" class="text-light text-decoration-none">Update</a>
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger">
                        <a href="delete.php?id=<?= $row['id'] ?>" class="text-light text-decoration-none">Delete</a>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">
                        No DATA
                    </td>
                </tr>
      <?php endif; ?>
 </tbody>
</table>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>