<?php
  $con = mysqli_connect("localhost", "root", "", "minor2");
  session_start();
  $userprofile = $_SESSION['username'];

  if($userprofile)
  {

  }
  else
  {
    header("location:login.php");
  }
  // for profile pic
  $Query = "select * from users where user_name = '$userprofile'";
  $runQuery = mysqli_query($con, $Query);
  $data = mysqli_fetch_assoc($runQuery);
  $profile_pic = $data['user_profile_picture'];
  $userID = $data['user_id'];
  
?>

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
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto ml-5">
        <li class="nav-item active ml-5">
          <a class="btn btn-danger" role="button" href="logout.php">Logout <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-5">
          <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="nav-link" href="review.php">Rate Us/Blog<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="nav-link" href="dashboard.php">Back<span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 mr-5 ">
        <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0 mr-5" type="submit">Search</button>
      </form>
    </div>
  </nav>
    
    <div class="jumbotron jumbotron-fluid text-center bg-light">
        <img class="logo mb-1" src="images/logo.png" alt="logo" height="350" width="700">
        <p class="tagline ml-5">The foremost source for everything in student welfare</p>
    </div>

    <div class="container-fluid row text-center">
        <div class="col-md-4">
            <div class="card" style="background:transparent;border:none;">
                <img class="" src="images/phone.png" width=200 style="margin-left:30%;border-radius:2000px;">
                <h1 class="card-title mt-2">Talk To Us</h1>
                <div class="card-body">Contact Number : <br><b>8989430080</b></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="background:transparent;border:none;">
            <img class="" src="images/mail.jfif" width=200 style="margin-left:30%;border-radius:2000px;">
                <h1 class="card-title mt-2">Mail Us</h1>
                <div class="card-body">Email : <br><b>panthitesh6410@gmail.com</b></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="background:transparent;border:none;">
            <img class="" src="images/social.jfif" width=200 style="margin-left:30%;border-radius:100px;">
                <h1 class="card-title mt-2">Follow Us On</h1>
                <div class="card-body"><ul><li class="nav-link"><b>Facebook</b></li><li class="nav-link"><b>Instagram</b></li><li class="nav-link"><b>Twitter</b></li><li class="nav-link"><b>Quora</b></li></ul></div>
            </div>
        </div>
    </div>

<br><br><br>
                   <p class="text-center mb-0"><b>MongersClub</b></p>
		
    <footer class="footer" style="margin-bottom: -1%;">
            <div class="container-fluid bg-dark footer" style="padding:10px;color:#fff;font-family:comic sans MS;">
                    <div class="row mt-3">
                    <div class="col-sm-4">
                            <div class="card text-center" style="background:none;border:none;">
                            <span><b>Need Help</b></span><br>
                                <div class="card-text">
                                    <a href="contact.php" class="card-link">Contact Us</a>
                                </div>        
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card text-center" style="background:none;border:none;">
                                    <span><b>Visit Us</b></span><br>
                                <div class="card-text">
                                    Ranjhi, Jabalpur (M.P)-482005
                                </div>        
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card text-center" style="background:none;border:none;">
                                    <span><b>Share this Community</b></span><br>
                                <div class="card-text">
                                    <a href="#" class="card-link">Facebook</a><br>
                                    <a href="#" class="card-link">Instagram</a><br>
                                    <a href="#" class="card-link">Twitter</a><br>
                                    <a href="#" class="card-link">Quora</a><br>
                                </div>        
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="footer text-center">MongersClub &copy; copywrite 2019 	<!-- copywrite symbol --></div>
                </div>
    </footer>



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