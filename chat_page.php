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
    <title>chat</title>
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
        <li class="nav-item active ml-3">
          <a class="nav-link" href="dashboard.php">Dashboard<span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 mr-5" action="" method="POST">
        <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search" name="search_area">
        <button class="btn btn-success my-2 my-sm-0 mr-5" type="submit" name="search_btn" name='search_btn'>Search</button>
      </form>
      <input id="mode" type="button" class="btn btn-light" value="Dark-Mode" onclick="change()">
    </div>
  </nav>
            

  <?php
      if(isset($_POST['search_btn']))
      {
          $search_result = $_POST['search_area']; 
          header("location:search.php?search_result=".$search_result);
      }
  ?>

        <br><br><br>

    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-4 text-center" >
                <?php echo"<img width='230' height='230' src='user_images/$profile_pic' alt='profile_pic' style='border-radius: 130px;'>" ?>
                <h3 class="mt-5 mb-5" style="font-family:Stencil;"><?php echo $userprofile;?></h3>        
                <a href="view_account_details.php" class="nav-link"><h5>View Account Details</h5></a>
                <a href="edit_Account_details.php" class="nav-link mt-1"><H5>Edit Account Details</h5></a>
                <a href="insert_product.php" class="nav-link mt-1"><H5>Share a product</h5></a>
                <a href="review.php" class="nav-link mt-1"><H5>Write a Review</h5></a>
            </div>
            <div class="col-sm-6">
                <h3 class="text-center alert alert-dark">ALL CHATS</h3>
                
                <?php
                    $show_users = "select * from users where user_id!=$userID";
                    $run_show_users = mysqli_query($con, $show_users);
                    while($user_result = mysqli_fetch_array($run_show_users))
                    {
                        $user_id = $user_result['user_id'];
                        $user_name = $user_result['user_name'];
                        $user_profile_pic = $user_result['user_profile_picture'];
                        // $_SESSION['user'] = $user_id;
                        // $_SESSION['user'] = $user_id;
                        echo "
                        <a href='chat_room.php?user=$user_id'>
                        <div class='card mb-3 alert alert-warning'>
                            <div class='row'>
                                <div class='col-sm-4'>
                                    <img src='user_images/$user_profile_pic' height=100 width=100 alt='' class='ml-3' style='border-radius:1000px;'>
                                </div>
                                <div class='col-sm-4'>
                                    <h4 class='text-center mt-4' style='font-family:verdana;''>$user_name</h4>
                                </div>
                            </div>
                        </div>
                        </a>
                        ";
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="js/dark-mode.js"></script>
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