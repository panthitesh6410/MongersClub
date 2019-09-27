<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto ml-5">
        <li class="nav-item active ml-5">
          <a class="nav-link " href="signup.php">SignUp <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
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


        
     <br><br><br>
    <div class="container-fluid" style="position:fixed;"> <a role="button" class="btn btn-danger" href="index.php">Go Back</a></div>
    
    
    
    <div class="text-center">
        <div class="spinner-border" role="status">
          <span class="sr-only">Loading...</span>
        </div>
    </div>

    <?php
      $con = mysqli_connect("localhost", "root", "", "minor2");

      $pro_id = $_GET['product_id'];
    
      $query = "select * from products where product_id = '$pro_id'";
      $run_query = mysqli_query($con, $query);
      $data = mysqli_fetch_array($run_query);

      $product_title = $data['product_name'];
      $product_mode = $data['product_mode'];
      $product_img = $data['product_image'];
      $product_upload_time = $data['product_time'];
      $product_detail = $data['product_description'];
      $prodcut_owner_id = $data['product_owner_id'];

      $owner_query = "select * from users where user_id = '$prodcut_owner_id'";
      $run_owner_query = mysqli_query($con, $owner_query);
      $owner_data = mysqli_fetch_array($run_owner_query);

      $owner_name = $owner_data['user_name'];
      $owner_email = $owner_data['user_email'];
      $owner_img = $owner_data['user_profile_picture'];
      $owner_phone = $owner_data['user_phone'];
      $owner_institute = $owner_data['user_institute'];
      $owner_place = $owner_data['user_place'];

    ?>


    <div class="container text-center">
        <h3  class="mb-5" style="font-family:stencil;"><?php echo $product_title; ?></h3>
        <img src="product_images/<?php echo $product_img; ?>" alt="" height=500 width=500>
        <br><br><br>
        <h3 style="font-family:stencil;">Product Details :</h3>
        <br>
        <div class="row">
          <div class="col-sm-6"><h4>Product Mode</h4></div>
          <div class="col-sm-6" ><h4 style="color:blue;"><?php echo $product_mode; ?></h4></div>
        </div>
        <div class="row">
          <div class="col-sm-6 mt-4"><h4>Upload Date</h4></div>
          <div class="col-sm-6 mt-4"><h4 style="color:blue;"><?php echo $product_upload_time; ?></h4></div>
        </div>
        <div class="row">
          <div class="col-sm-6 mt-4"><h4>Product Description</h4></div>
          <div class="col-sm-6 mt-4"><h4 style="color:blue;"><?php echo $product_detail; ?></h4></div>
        </div>
        <br><br><br>
        <h3 style="font-family:stencil;">Owner Details :</h3>
        <br>
        <img src="user_images/<?php echo $owner_img; ?>" class="mt-3" width="200" height="200" alt="" style="border-radius:300px;">
        <br>
        <div class="row mt-5">
          <div class="col-sm-6"><h4>Owner Name</h4></div>
          <div class="col-sm-6" ><h4 style="color:blue;"><?php echo $owner_name; ?></h4></div>
        </div>
        <div class="row">
          <div class="col-sm-6 mt-4"><h4>Owner E-mail</h4></div>
          <div class="col-sm-6 mt-4"><h4 style="color:blue;"><?php echo $owner_email; ?></h4></div>
        </div>
        <div class="row">
          <div class="col-sm-6 mt-4"><h4>Owner Contact No.</h4></div>
          <div class="col-sm-6 mt-4"><h4 style="color:blue;"><?php echo $owner_phone; ?></h4></div>
        </div>
        <div class="row">
          <div class="col-sm-6 mt-4"><h4>Owner Institute</h4></div>
          <div class="col-sm-6 mt-4"><h4 style="color:blue;"><?php echo $owner_institute; ?></h4></div>
        </div>
        <div class="row">
          <div class="col-sm-6 mt-4"><h4>Owner Place</h4></div>
          <div class="col-sm-6 mt-4 mb-5"><h4 style="color:blue;"><?php echo $owner_place; ?></h4></div>
        </div>
    </div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
<script>
    $(document).ready(function()
    {
        $("body").animate({opacity:'1'}, 2000);

        $(".spinner-border").animate({opacity:'0'}, 1000);
    });
</script>
</html>