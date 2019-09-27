<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto ml-5">
        <li class="nav-item active ml-5">
          <a class="nav-link btn btn-warning" href="signup.php">SignUp <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="nav-link" href="contact.php">Contact Us <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="nav-link" href="blog.php">Rate Us/Blog<span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 mr-5 ">
        <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0 mr-5" type="submit">Search</button>
      </form>
    </div>
  </nav>

              
        

    <div class="container bg-light w-25" style="margin-top:4%;border-radius:10px;padding:20px;box-shadow: 15px 15px 20px 20px #ddd;">
        <form action="login.php" method="POST">
            <div class="text-center"><h3 style="font-family: Stencil">Login to Mongers Club</h3></div>
            <img src="images/logo.png" alt="" width="300" height="auto">
            <div class="form-group">
                <input id="user_id" type="text" name="confirm_user_name" class="form-control text-center" placeholder="enter username" autocomplete="off" required>
            </div>
            <br>
            <div class="form-group">
                <input id="pwd_id" type="password" name="confirm_user_password" class="form-control text-center" placeholder="enter password" required>
            </div>
            <br>
            <div class="text-center">
                <button class="btn btn-primary" name="login_submit"><b>LOGIN</b></button>
            </div>
        </form>
    </div>

    <div class="container-fluid mt-5 text-center" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;position: absolute;top: 78%;">
        <h3 class="mt-5">If You are not a Member <a href="signup.php">Register Yousrself Here</a></h3>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function()
      {
        $("body").animate({opacity:'1'}, 2000);
      });
    </script>
</body>
</html>

<?php
  $con = mysqli_connect("localhost", "root", "", "minor2");
  error_reporting(0);
  $confirm_user_name = $_POST['confirm_user_name'];
  $confirm_user_password = $_POST['confirm_user_password'];
  if(isset($_POST['login_submit']))
  {
    $query = "select * from users where user_name = '$confirm_user_name' and user_password = '$confirm_user_password'";
    $run_query = mysqli_query($con, $query);
    $row = mysqli_num_rows($run_query);
    if($row == 1)
    {
      session_start();
      $_SESSION['username'] = $confirm_user_name;
      header("location:dashboard.php?username=".$confirm_user_name);
    }
    else{
      echo "<h2 class='alert alert-danger mt-5' style='text-align:center;'><b>Login Failed</b></h2>";
      echo "<script>alert('Login Failed');</script>";
    }
  } 
?>