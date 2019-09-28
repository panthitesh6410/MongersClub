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
  $username = $data['user_name'];
  $userID = $data['user_id'];
  

  if(isset($_POST['submit_review']))
  {
      $review_body = $_POST['user_review'];
      $review_date = date('d-m-y');
      $review_owner_id = $userID; 

      $insert_query = "insert into reviews (review_body, review_date, review_owner_id) values ('$review_body', '$review_date', '$review_owner_id')";
      $run_insert_query = mysqli_query($con, $insert_query);
      if($run_insert_query)
      {
          echo "<script>alert('review added successfully');</script>";
      }
      else{
        echo "<script>alert('Unable to add Review');</script>";
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
          <a class="nav-link" href="contact.php">Contact Us <span class="sr-only">(current)</span></a>
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
            

        <br><br><br>

    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-4 text-center" >
                <?php echo"<img width='230' height='230' src='user_images/$profile_pic' alt='profile_pic' style='border-radius: 130px;'>" ?>
                <h3 class="mt-5 mb-5" style="font-family:Stencil;"><?php echo $userprofile;?></h3>        
                <a href="view_account_details.php" class="nav-link"><h5>View Account Details</h5></a>
                <a href="edit_Account_details.php" class="nav-link mt-1"><H5>Edit Account Details</h5></a>
                <a href="insert_product.php" class="nav-link mt-1"><H5>Share a product</h5></a>
                <a href="dashboard.php" class="nav-link mt-1"><H5>Back</h5></a>
            </div>
        <div class="col-sm-8 text-center">
          
        <div class="container review text-center">
        <h2>Ratings  &  Reviews</h2>
        <img src="images/rnr.jfif" alt="rating&review" height=150>
        <p>We like to welcome your reviews and opinions Here.<br>Rate Us on the Basis of your experience with Us</p>
    </div>
<br>
<form action="" method="POST" class="text-center">
        <div class="form-group" class="fixed-middle">
            <input type="text" class="form-control text-center" placeholder="Write your Review" name="user_review" style="border:3px solid #ddd;" autocomplete="off" required>
            <button class="btn btn-primary mt-3" name="submit_review">Submit Review</button>
        </div>
    </form>

<br>  
    <div class="container user_reviews mt-4">
    <?php
          $con = mysqli_connect("localhost", "root", "", "minor2");
            $review_query = "select * from reviews order by review_id desc";
            $run_review_query = mysqli_query($con, $review_query);
            while($show_data = mysqli_fetch_array($run_review_query))
            {
                $show_review_owner_id = $show_data['review_owner_id'];
                $user_query = "select * from users where user_id = '$show_review_owner_id'";
                $run_user_query = mysqli_query($con, $user_query);
                $user_data = mysqli_fetch_array($run_user_query);
                
                $show_profile_pic = $user_data['user_profile_picture'];
                $show_username = $user_data['user_name'];
                $show_review_body = $show_data['review_body'];
                $show_review_date = $show_data['review_date'];

                echo "
                <div class='card user_review' style='margin-right:20%;'>
                <div class='row mb-5'>
                    <div class='col-sm-4'>
                        <img src='user_images/$show_profile_pic' alt='' height=100 style='border-radius:500px;margin-left:3%;'>
                    </div>
                    <div class='col-sm-8'>
                        <h4><B>$show_username</B></h4>
                        <p style='font-family:comic sans MS;'>$show_review_body</p>
                        <small style='font-family:verdana;'> added on $show_review_date</small>
                    </div>
                </div>
                <br>
            </div>
                ";
            }
        ?>
    </div>
       
        <br><br><br>
  
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