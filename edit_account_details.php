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
  if(isset($_POST['save_username']))
  {
      $new_username = $_POST['edit_username'];
      $query1 = "update users set user_name = '$new_username' where user_name = '$userprofile'";
      $run_query1 = mysqli_query($con, $query1);
      if($run_query1)
      {
          echo "<script>alert('Username updated successfully');</script>";
      }
      else
      {
          echo "<script>alert('Unable to update');</script>";
      }
  }
  if(isset($_POST['save_email']))
  {
      $new_email = $_POST['edit_email'];
      $query2 = "update users set user_email = '$new_email' where user_name = '$userprofile'";
      $run_query2 = mysqli_query($con, $query2);
      if($run_query2)
      {
          echo "<script>alert('Email updated successfully');</script>";
      }
      else
      {
          echo "<script>alert('Unable to update');</script>";
      }
  }
  if(isset($_POST['save_password']))
  {
      $new_password = $_POST['edit_password'];
      $query3 = "update users set user_password = '$new_password' where user_name = '$userprofile'";
      $run_query3 = mysqli_query($con, $query3);
      if($run_query3)
      {
          echo "<script>alert('Password updated successfully');</script>";
      }
      else
      {
          echo "<script>alert('Unable to update');</script>";
      }
  }
  if(isset($_POST['save_phone']))
  {
      $new_phone = $_POST['edit_phone'];
      $query4 = "update users set user_phone = '$new_username' where user_name = '$userprofile'";
      $run_query4 = mysqli_query($con, $query4);
      if($run_query4)
      {
          echo "<script>alert('Phone number updated successfully');</script>";
      }
      else
      {
          echo "<script>alert('Unable to update');</script>";
      }
  }
  if(isset($_POST['save_place']))
  {
      $new_place = $_POST['edit_place'];
      $query5 = "update users set user_place = '$new_place' where user_name = '$userprofile'";
      $run_query5 = mysqli_query($con, $query5);
      if($run_query5)
      {
          echo "<script>alert('Residance place  updated successfully');</script>";
      }
      else
      {
          echo "<script>alert('Unable to update');</script>";
      }
  }
  if(isset($_POST['save_institute']))
  {
      $new_institute = $_POST['edit_institute'];
      $query6 = "update users set user_institute = '$new_institute' where user_name = '$userprofile'";
      $run_query6 = mysqli_query($con, $query6);
      if($run_query6)
      {
          echo "<script>alert('Institute updated successfully');</script>";
      }
      else
      {
          echo "<script>alert('Unable to update');</script>";
      }
  }
  if(isset($_POST['insert_profile_picture']))
  {
      $new_profile_picture = $_FILES['profile_picture']['name'];
      $temp_loc = $_FILES['profile_picture']['tmp_name'];
      $image_store = "user_images/".$new_profile_picture;
      move_uploaded_file($temp_loc, $image_store);
      $query7 = "update users set user_profile_picture = '$new_profile_picture' where user_name = '$userprofile'";
      $run_query7 = mysqli_query($con, $query7);
      if($run_query7)
      {
          echo "<script>alert('Profile picture updated successfully');</script>";
      }
      else
      {
          echo "<script>alert('unable to update');</script>";
      }
  }
  // for profile pic
  $Query = "select * from users where user_name = '$userprofile'";
  $runQuery = mysqli_query($con, $Query);
  $data = mysqli_fetch_assoc($runQuery);
  $profile_pic = $data['user_profile_picture'];

    // to delete account:
    if(isset($_POST['delete_account']))
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
            <div class="col-sm-4 text-center">
            <?php echo"<img width='230' height='230' src='user_images/$profile_pic' alt='profile_pic' style='border-radius: 130px;'>" ?>
                <h3 class="mt-5 mb-5" style="font-family:Stencil;"><?php echo $userprofile;?></h3>        
                <a href="view_account_details.php" class="nav-link"><h5>View Account Details</h5></a>
                <a href="dashboard.php" class="nav-link mt-1"><h5>Back</h5></a>
                <a href="insert_product.php" class="nav-link mt-1"><h5>Share a product</h5></a>
                <a href="review.php" class="nav-link mt-1"><H5>Write a Review</h5></a>
                <button class="btn btn-danger mt-5" data-toggle="modal" data-target="#delete_account">Delete Account</button>
                <div class="modal fade" id="delete_account" tabindex=-1 role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="dialog">
                    <div class="modal-content">
                      <h3>Are You Sure , You Want To Delete This Account ?</h3>
                      <div class="modal-footer">
                        <form action="" method="POST"><button class="btn btn-warning" name="delete_account">Yes</button></form>
                        <button class="btn btn-primary" data-dismiss="modal">No</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        <div class="col-sm-8 text-center">
            <h3 class="alert alert-dark">Edit Account Details</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row mt-5 ml-5">
                    <div class="col-sm-6">
                        <input type="text" name="edit_username" class="form-control" placeholder="Update Username"><br>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" name="save_username">Save</button>                        
                    </div>
                </div>
                <div class="row ml-5">
                    <div class="col-sm-6">
                        <input type="text" name="edit_email" class="form-control " placeholder="Update Email"><br>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" name="save_email">Save</button>                        
                    </div>
                </div>
                <div class="row ml-5">
                    <div class="col-sm-6">
                        <input type="password" name="edit_password" class="form-control " placeholder="Update Password"><br>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" name="save_password">Save</button>                        
                    </div>
                </div>
                <div class="row ml-5">
                    <div class="col-sm-6">
                        <input type="phone" name="edit_phone" class="form-control " placeholder="Update Phone no."><br>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" name="save_phone">Save</button>                        
                    </div>
                </div>
                <div class="row ml-5">
                    <div class="col-sm-6">
                        <input type="text" name="edit_place" class="form-control" placeholder="Update Place"><br>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" name="save_place">Save</button>                        
                    </div>
                </div>
                <div class="row ml-5">
                    <div class="col-sm-6">
                        <input type="text" name="edit_institute" class="form-control" placeholder="Update Institute"><br>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" name="save_institute">Save</button>                        
                    </div>
                </div>
                <div class="row ml-5">
                <div class="col-sm-6">
                    <input type="file" name="profile_picture" class="form-control">
                </div>
                <div class="col-sm-6">
                        <button class="btn btn-primary" name="insert_profile_picture">insert profile picture</button>
                    </div>
                </div>
            </form>  
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