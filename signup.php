
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
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto ml-5">
            <li class="nav-item active ml-5">
              <a class="nav-link btn btn-primary" href="login.php">Login <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active ml-3">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active ml-3">
              <a class="nav-link" href="contact.php">Contact Us <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active ml-3">
              <a class="nav-link" href="blog.php">Rate Us/Blog<span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0 mr-5 ">
            <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-success my-2 my-sm-0 mr-5" type="submit">Search</button>
          </form>
        </div>
      </nav>
        
    <div class="container w-50 bg-light " style="margin-top:6%;border-radius:10px;padding:20px;box-shadow: 15px 15px 20px 20px #ddd;">
        <form action="signup.php" method="POST">
            <div class="text-center"><h3 style="font-family: Stencil">Register to Mongers Club</h3></div>
            <img src="images/logo.png" alt="" width="300" height="auto" style="position:relative;left:30%;">
            <div class="form-group">
                <input id="user_id" type="text" class="form-control text-center" name="name" placeholder="enter your username" autocomplete="off" required>
            </div>
            <div class="form-group">
                    <input id="email_id" type="email" class="form-control text-center" name="email" placeholder="enter a valid e-mail" autocomplete="off" required>
                </div>
            
            <div class="form-group">
                <input id="pwd_id" type="password" class="form-control text-center" name="password" placeholder="enter your password" required>
            </div>
            <div class="form-group">
                <input id="phone_id" type="phone" class="form-control text-center" name="phone" placeholder="enter your phone number" autocomplete="off" required>
            </div>
            <div class="form-group">
                <input id="institute_id" type="text" class="form-control text-center" name="institute" placeholder="enter your institute (not compulsary)" autocomplete="off">
                </div>
                <div class="form-group">
                        <input id="place_id" type="text" class="form-control text-center" name="place" placeholder="enter residance place (not compulsary)" autocomplete="off">
                </div>
                <div class="form-check-inline" style="margin-left:40%;">
                        <input id="male_id" type="radio" class="form-check-input" name="gender" value="male">
                        <label for="male_id">Male</label>
                    </div>
                    <div class="form-check-inline">
                        <input id="female_id" type="radio" class="form-check-input ml-5" name="gender" value="female">
                        <label for="female_id">Female</label>
                    </div>
            <br>
            <br>
            <div class=" form-check text-center">
                <input type="checkbox" class="form-check-input mt-2" id="checkbox" required>
                <label for="checkbox" class="form-check-label badge badge-danger ">Yes, i want to join the community </label>
            </div>
            <br>
            <div class="text-center">
                <button class="btn btn-warning" name="signup_submit"><b>SIGNUP</b></button>
            </div>
        </form>
    </div>

    <div class="container-fluid mt-5 text-center " style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;position: absolute;top: 100%;">
        <h3 class="mt-5">If You are already a Member <a href="login.php">Login Here</a></h3>
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
  $user_name = $_POST['name'];
  $user_email = $_POST['email'];
  $user_password = $_POST['password'];
  $user_phone = $_POST['phone'];
  $user_institute = $_POST['institute'];
  $user_place = $_POST['place'];
  $user_gender = $_POST['gender'];
  if(isset($_POST['signup_submit']))
  {
    $query = "insert into users (user_name, user_email, user_password, user_phone, user_institute, user_place, user_gender) values ('$user_name', '$user_email', '$user_password', '$user_phone', '$user_institute', '$user_place', '$user_gender')";
    $run_query = mysqli_query($con, $query);
    if($run_query)
    {
      echo "<script>alert('you are succssfully registered');</script>";
      header("location:login.php");
    }
  }
?>