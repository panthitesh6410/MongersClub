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
  $query = "select * from users where user_name = '$userprofile'";
  $run_query = mysqli_query($con, $query);
  $data = mysqli_fetch_array($run_query);
  $name = $data['user_name'];
  $email = $data['user_email'];
  $gender = $data['user_gender'];
  $phone = $data['user_phone'];
  $institute = $data['user_institute'];
  $place = $data['user_place'];
  // for profile pic
  $Query = "select * from users where user_name = '$userprofile'";
  $runQuery = mysqli_query($con, $Query);
  $data = mysqli_fetch_assoc($runQuery);
  $profile_pic = $data['user_profile_picture'];

  // to delete account:
  if(isset($_POST['del_acc']))
  {
      $del_query = "delete from users where user_name = '$userprofile'";
      $run_del_query = mysqli_query($con, $del_query);
      if($run_del_query)
      {
          echo "<script>alert('Account Deleted Successfully');</script>";
      }
  }
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
          <a class="nav-link" href="contact_session.php">Contact Us <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="nav-link" href="review.php">Rate Us/Blog<span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 mr-5 ">
        <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0 mr-5" type="submit">Search</button>
      </form>
    </div>
  </nav>
    
        

        <br><br><br>

    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-4 text-center" >
            <?php echo"<img width='230' height='230' src='user_images/$profile_pic' alt='profile_pic' style='border-radius: 130px;'>" ?>
                <h3 class="mt-5 mb-5" style="font-family:Stencil;"><?php echo $userprofile;?></h3>        
                <a href="dashboard.php" class="nav-link"><h5>Back</h5></a>
                <a href="edit_account_details.php" class="nav-link mt-1"><h5>Edit Account Details</h5></a>
                <a href="insert_product.php" class="nav-link mt-1"><h5>Share a product</h5></a>
                <a href="review.php" class="nav-link mt-1"><H5>Write a Review</h5></a>
                <button class="btn btn-danger mt-5" data-toggle="modal" data-target="#delete_account">Delete Account</button>
                <div class="modal fade" id="delete_account" tabindex=-1 role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="dialog">
                    <div class="modal-content">
                      <h3>Are You Sure , You Want To Delete This Account ?</h3>
                      <div class="modal-footer">
                        <form action="" method="POST"><button class="btn btn-warning" name="del_acc">Yes</button></form>
                        <button class="btn btn-primary" data-dismiss="modal">No</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        <div class="col-sm-8  text-center">
            <h3 class="mb-5 alert alert-dark">Account Details</h3>
          <div style="font-family:Courier New, Courier, monospace">
            <div class="row mb-5">
              <div class="col-sm-6"><h4><b>Name</b></h4></div>
              <div class="col-sm-6" style="color:blue;"><h4><b><?php echo $name ?></b></h4></div>
            </div>
            <div class="row mb-5">
              <div class="col-sm-6"><h4><b>E-mail</b></h4></div>
              <div class="col-sm-6" style="color:blue;"><h4><b><?php echo $email ?></b></h4></div>
            </div>
            <div class="row mb-5">
              <div class="col-sm-6"><h4><b>Gender</b></h4></div>
              <div class="col-sm-6" style="color:blue;"><h4><b><?php echo $gender ?></b></h4></div>
            </div>
            <div class="row mb-5">
              <div class="col-sm-6"><h4><b>Phone</b></h4></div>
              <div class="col-sm-6" style="color:blue;"><h4><b><?php echo $phone ?></b></h4></div>
            </div>
            <div class="row mb-5">
              <div class="col-sm-6"><h4><b>Institute</b></h4></div>
              <div class="col-sm-6" style="color:blue;"><h4><b><?php echo $institute ?></b></h4></div>
            </div>
            <div class="row mb-5">
              <div class="col-sm-6"><h4><b>Place</b></h4></div>
              <div class="col-sm-6" style="color:blue;"><h4><B><?php echo $place ?></B></h4></div>
            </div>
          </div>
        </div>     
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