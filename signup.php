

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <?php
    require 'partials/nav.php';

    ?>
   
<?php
include 'partials/connect.php';
 if($_SERVER["REQUEST_METHOD"] == "POST")
{


$showalert = false;
$username = $_POST['username'];
$userpass = $_POST['paswords'];
$userconfirm = $_POST['cpassword'];
// $exist = false;

$exist = "SELECT * FROM connection WHERE username='$username'";
$existquery = mysqli_query($conn,$exist);
$existrowsdata = mysqli_num_rows($existquery);
if($existrowsdata<0)
{
  echo "gand mara";
}
else {
  if(($userpass==$userconfirm))
  // && $exist==false
  {
    $query = "INSERT INTO connection(username,userpass,dt) VALUES('$username','$userpass',current_timestamp())";
    $result = mysqli_query($conn,$query);
    if($result)
    {
      $showalert = true;
      
    }
    if($showalert)
    {
      echo
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Hey! Welcome '.$username.'</strong> Your Account Successfully created you can easily login.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
     
  
  
  }
  if(($userpass!==$userconfirm))
    {
     
      echo
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hey! '.$username.'</strong> Your Password Does not match to your confirmpass.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
  
  
}

}

?>
<h1 style="text-align:center;font-weight:bold !important;">Sign up Your Account</h1>
<form action="/signup/signup.php" method="post" style="display:flex;flex-direction:column;align-items:center;">
  <div class="mb-3 col-md-6" >
    <label for="exampleInputEmail1 " class="form-label">Your Username</label>
    <input type="name" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your any information with anyone else.</div>
  </div>
  <div class="mb-3 col-md-6">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="paswords">
  </div>

  <div class="mb-3 col-md-6">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword">
  </div>
    <button type="submit" class="btn btn-primary col-md-2">Submit</button>
</form>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>

