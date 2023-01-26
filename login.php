<?php

include 'partials/connect.php';
$login = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$username = $_POST["username"];
$userpass = $_POST["password"];


$query = "SELECT * FROM connection where username='$username' AND userpass='$userpass'";
$results = mysqli_query($conn,$query);
$num = mysqli_num_rows($results);

  if($num == 1)
  {
  $login = true;
  session_start();
  $_SESSION['login'] = true;
  $_SESSION['username'] = $username;
  header("location: welcome.php");
  }
  else
  {
    $showerror = "invalid Account";
  }

}




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <?php
    require 'partials/nav.php';
    ?>
    <?php
      
  if($login)
  {
    echo
    '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Hey! Welcome '.$username.'</strong> Your Account Successfully login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  if($showerror)
  {
    echo
    '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>'.$showerror.'</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
    ?>
<form action="/signup/login.php" method="post" style="display:flex;flex-direction:column;align-items:center;">
   <h1>Log In Page</h1>
  <div class="mb-3 col-md-4" >
    <label for="exampleInputEmail1 " class="form-label">Enter Username</label>
    <input type="name" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your any information with anyone else.</div>
  </div>
  <div class="mb-3 col-md-4">
    <label for="exampleInputPassword1" class="form-label">Enter a Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>

    <button type="submit" class="btn btn-primary  col-md-2">Log in</button>
</form>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
</html>

