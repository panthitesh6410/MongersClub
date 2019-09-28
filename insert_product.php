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

  if(isset($_POST['insert_product']))
  {
    $product_name = $_POST['insert_product_name'];
    $product_image = $_FILES['insert_product_image']['name'];
    $img_temp_loc = $_FILES['insert_product_image']['tmp_name'];
    $img_store = "product_images/".$product_image;
    move_uploaded_file($img_temp_loc, $img_store);
    $product_mode = $_POST['insert_product_mode'];
    $confirm_pass = $_POST['confirm_password'];
    $product_details = $_POST['insert_product_details'];
    $time = date('d-m-y');
    $owner_id = $data['user_id'];

    if($confirm_pass == $data['user_password'])
    {
      $insert_query = "insert into products (product_name, product_mode, product_image, product_description, product_time, product_owner_id) values ('$product_name', '$product_mode', '$product_image', '$product_details', '$time', '$owner_id')";
      $run_insert_query = mysqli_query($con, $insert_query);
      if($run_insert_query)
      {
        echo "<script>alert('product uploaded successfully');</script>";
      }
    }
    else{
      echo "<script>alert('check your password again!');</script>";
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
                <a href="view_account_details.php" class="nav-link"><h5>View Account Details</h5></a>
                <a href="edit_Account_details.php" class="nav-link mt-1"><h5>Edit Account Details</h5></a>
                <a href="review.php" class="nav-link mt-1"><H5>Write a Review</h5></a>
                <a href="dashboard.php" class="nav-link mt-1"><h5>Back</h5></a>
            </div>
        <div class="col-sm-8">
        <h3 class="alert alert-dark text-center">Insert a Product</h3>
          <form class="ml-5 mr-5" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group mt-5 ml-5 mr-5">
              <input type="text" name="insert_product_name" class="form-control" placeholder="enter product name" autocomplete="off" required>
            </div>
            <div class="form-group ml-5 mr-5">
              <label for="product_image">Insert product image :</label>
              <input id="product_image" type="file" name="insert_product_image" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group ml-5 mr-5">
              <h4>Select The Mode : </h4>
                <div class="form-check-inline">                    
                    <input type="radio" id="product_mode" name="insert_product_mode" class="form-check-input" value="Sale" required>
                    <label for="product_mode">Sale</label>
                </div>

                <div class="form-check-inline ml-5 mr-5">
                    <input type="radio" id="product_mode" name="insert_product_mode" class="form-check-input" value="Exchange" required>
                    <label for="product_mode">Exchange</label>
                </div>
                <div class="form-check-inline ml-5 mr-5">
                    <input type="radio" id="product_mode" name="insert_product_mode" class="form-check-input" value="Donate" required>
                    <label for="product_mode">Donate</label>
                </div>
            </div>
            <div class="form-group ml-5 mr-5">
              <input type="password" name="confirm_password" placeholder="confirm your password" required class="form-control">
            </div>
            <div class="form-group ml-5 mr-5">
              <textarea type="text" class="form-control mt-4" placeholder="enter product details / description" name="insert_product_details" rows="6"></textarea>
            </div>
            <button class="btn btn-primary" name="insert_product" style="margin-left:45%;">SUBMIT</button>
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