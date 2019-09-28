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
                <a href="edit_Account_details.php" class="nav-link mt-1"><H5>Edit Account Details</h5></a>
                <a href="insert_product.php" class="nav-link mt-1"><H5>Share a product</h5></a>
                <a href="review.php" class="nav-link mt-1"><H5>Write a Review</h5></a>
            </div>
        <div class="col-sm-8 text-center">
          <h3 class="alert alert-dark mb-5">Products You Share</h3>
            
        <?php
                $show_pro = "select * from products where product_owner_id = '$userID' order by product_id desc";
                $run_show_pro = mysqli_query($con, $show_pro);
                
                while($pro_data = mysqli_fetch_array($run_show_pro))
                {
                  $show_pro_id = $pro_data['product_id'];
                  $show_pro_name = $pro_data['product_name'];
                  $show_pro_mode = $pro_data['product_mode'];
                  $show_pro_date = $pro_data['product_time'];
                  $show_pro_img = $pro_data['product_image'];

                  echo "
                  <div class='card mb-5' style='max-width: 700px; height:250px;position: relative;left:20%;box-shadow: 10px 10px 10px 10px #ddd;'>
                  <div class='row no-gutters'>
                    <div class='col-md-4'>
                      <img src='product_images/$show_pro_img' class='card-img' alt='...' height='250'>
                    </div>
                    <div class='col-md-8'>
                      <div class='card-body text-center'>
                        <h5 class='card-title'><b>$show_pro_name</b></h5>
                        <p class='card-text'>
                          <div class='badge badge-warning'>$show_pro_mode</div>
                          <a href='#' class='nav-link mt-3'>View Product</a>
                        </p>
                        <p class='card-text'><small class='text-muted'>Uploaded on $show_pro_date</small></p>
                        <form action='' method='POST'><button class='btn btn-danger' name='delete_product'>Delete Product</button>
                      </div>
                    </div>
                  </div>
            </div>
                  ";

                }
        
                if(isset($_POST['delete_product']))
                {
                  $del_query = "delete from products where product_id = '$show_pro_id'";
                  $run_del_query = mysqli_query($con, $del_query);
                  if($run_del_query)
                  {
                    echo "<script>alert('product removed successfully');</script>";
                  }
                }
        
        ?>
          
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