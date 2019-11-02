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
          <a class="btn btn-warning" href="signup.php">SignUp <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="btn btn-primary" href="login.php">Login<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="nav-link" href="contact.php">Contact Us <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="nav-link" href="blog.php">Rate Us/Blog<span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 mr-5 " method="POST" action="index.php">
        <input class="form-control mr-sm-2 " type="search" placeholder="Search" name="search_area" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0 mr-5" type="submit" name="search_btn">Search</button>
      </form>
    </div>
  </nav>


        <div class="modal  mt-5 text-center" tabindex="-1" role="dialog" style="padding:10px;margin-left:2%;width:20%;">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <button type="button" data-dismiss="modal" class="close text-right" aria-label="Close">&times;</button>
                    <div class="login-modal">
                        <p class="alert alert-secondary">If you are already a member :</p>
                        <a role="button" class="btn btn-primary" href="login.php">click Here to Login</a>
                    </div>
                    <hr>
                    <div class="signup-modal">
                        <p class="alert alert-secondary">if you are not a member :</p>
                        <a role="button" class="btn btn-warning" href="signup.php">click Here to SignUp</a>
                    </div>
                    <br>
                    <button type="button" data-dismiss="modal" class="close text-left" aria-label="Close">&times;</button>
                </div>
            </div>
        </div>
     


    <div class="jumbotron jumbotron-fluid text-center bg-light mb-0 jumbo">
        <img class="logo mb-1" src="images/logo.png" id="logo" alt="logo" height="350" width="700">
        <p class="tagline ml-5">The foremost source for everything in student welfare</p>
    </div>
    
    
    <div class="text-center">
            <div class="spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>

    
    <div class="container next">
        <div class="row">
            <div class="col-sm-4">
                <div class="card text-center" style="border:none; background:transparent;">
                    <img src="images/aim.jpg" width="100" alt="" style="position: relative;left:35%;"><br>
                    <span class="card-title"><h2 class="card-title">AIM</h2></span>
                    <div class="card-text" style="font-family:comic sans MS;">This is a Community Of School and College Mongers to Share the Stuffs you Don't Need Anymore OR to Find What you Need Right Now.<br><br></div>
                </div>
            </div><br>
            <div class="col-sm-4">
                <div class="card text-center" style="border:none; background:transparent;">
                        <img src="images/about.png" width="100" alt="" style="position: relative;left:35%;"><br>
                        <span class="card-title"><h2 class="card-title">ABOUT</h2></span>
                        <div class="card-text" style="font-family:comic sans MS;">This is a Non-Profit Group Of College'ians, We Are Here to Help Students to Fulfil Their Needs Throughout their Academic Years.<br><br> Help this Community to Grow .<br><br><a href="signup.php" class="btn btn-warning" role="button">JOIN US</a></div>    
                </div>
            </div><br>
            <div class="col-sm-4">
                <div class="card text-center" style="border:none; background:transparent;">
                        <img src="images/service.jpg" width="100" alt="" style="position: relative;left:35%;"><br>
                        <span class="card-title"><h2 class="card-title">SERVICES</h2></span>
                        <div class="card-text" style="font-family:comic sans MS;">You Can Exchange, Sell, Buy or Donate Products Here.</div>
                </div>
            </div><br>
        </div>
    </div>
<br><br><br>

<div class="container">
    <h2><b style="font-family: Stencil">Recently Added Products :</b></h2>
    <br><br>

    <form action="" method="POST" style="position:absolute;left:72%;top:187%;">
      <select name="sort_products" id="" class="alert alert-success" style="padding:6px;border:2px solid green;border-radius:5px;">
        <option value="" selected disabled>Search products by Tag </option>
        <option value="all">All Products</option>
        <option value="sale">for Sale</option>
        <option value="exchange">for Exchange</option>
        <option value="donate">for Dontation</option>
      </select>
      <button class="btn btn-dark mb-2" name="show_products">show products</button>
    </form>


<?php

$con = mysqli_connect("localhost", "root", "", "minor2");

if(!isset($_POST['show_products']))
{
  $query = "select * from products order by product_id desc";
  $run_query = mysqli_query($con, $query);
  while($data = mysqli_fetch_array($run_query))
  {
      $show_product_id = $data['product_id'];
      $show_product_name = $data['product_name'];
      $show_product_image = $data['product_image'];
      $show_product__description = $data['product_description'];
      $show_product_time = $data['product_time'];
      $show_product_mode = $data['product_mode'];
      $show_product_owner_id = $data['product_owner_id'];
  
      echo "
      <div class='card mb-3' style='max-width: 800px; height:250px;position: relative;left:15%;box-shadow: 10px 10px 10px 10px #ddd;'>
      <div class='row no-gutters'>
        <div class='col-md-4'>
          <img src='product_images/$show_product_image' class='card-img' alt='' style='height:250px;'>
        </div>
        <div class='col-md-8'>
          <div class='card-body text-center'>
            <h5 class='card-title'><b>$show_product_name</b></h5>
            <p class='card-text'>
              <div class='badge badge-danger mt-3'><h4>$show_product_mode</h4></div>
              <a href='product_details.php?product_id=$show_product_id' class='nav-link mt-3' style='font-size:20px;font-family:comic sans MS;'>View Product</a>
            </p>
            <p class='card-text'><small class='text-muted'>uploaded on $show_product_time</small></p> 
          </div>
        </div>
      </div>
</div><br><br>
      ";
  }
}

// search products on basis of tags (sale, exchange, donate) :

if(isset($_POST['show_products']))
    {
        if($_POST['sort_products'] == "sale")
        {
          $sale_query = "select * from products where product_mode = 'Sale'";
          $run_sale_query = mysqli_query($con, $sale_query);
          while($data = mysqli_fetch_array($run_sale_query))
          {
              $show_product_id = $data['product_id'];
              $show_product_name = $data['product_name'];
              $show_product_image = $data['product_image'];
              $show_product__description = $data['product_description'];
              $show_product_time = $data['product_time'];
              $show_product_mode = $data['product_mode'];
              $show_product_owner_id = $data['product_owner_id'];
          
              echo "
              <div class='card mb-3' style='max-width: 800px; height:250px;position: relative;left:15%;box-shadow: 10px 10px 10px 10px #ddd;'>
              <div class='row no-gutters'>
                <div class='col-md-4'>
                  <img src='product_images/$show_product_image' class='card-img' alt='' style='height:250px;'>
                </div>
                <div class='col-md-8'>
                  <div class='card-body text-center'>
                    <h5 class='card-title'><b>$show_product_name</b></h5>
                    <p class='card-text'>
                      <div class='badge badge-danger mt-3'><h4>$show_product_mode</h4></div>
                      <a href='product_details.php?product_id=$show_product_id' class='nav-link mt-3' style='font-size:20px;font-family:comic sans MS;'>View Product</a>
                    </p>
                    <p class='card-text'><small class='text-muted'>uploaded on $show_product_time</small></p> 
                  </div>
                </div>
              </div>
        </div><br><br>
              ";
          }
        }
        if($_POST['sort_products'] == "exchange")
        {
          $exchange_query = "select * from products where product_mode = 'Exchange'";
          $run_exchange_query = mysqli_query($con, $exchange_query);
          while($data = mysqli_fetch_array($run_exchange_query))
          {
              $show_product_id = $data['product_id'];
              $show_product_name = $data['product_name'];
              $show_product_image = $data['product_image'];
              $show_product__description = $data['product_description'];
              $show_product_time = $data['product_time'];
              $show_product_mode = $data['product_mode'];
              $show_product_owner_id = $data['product_owner_id'];
          
              echo "
              <div class='card mb-3' style='max-width: 800px; height:250px;position: relative;left:15%;box-shadow: 10px 10px 10px 10px #ddd;'>
              <div class='row no-gutters'>
                <div class='col-md-4'>
                  <img src='product_images/$show_product_image' class='card-img' alt='' style='height:250px;'>
                </div>
                <div class='col-md-8'>
                  <div class='card-body text-center'>
                    <h5 class='card-title'><b>$show_product_name</b></h5>
                    <p class='card-text'>
                      <div class='badge badge-danger mt-3'><h4>$show_product_mode</h4></div>
                      <a href='product_details.php?product_id=$show_product_id' class='nav-link mt-3' style='font-size:20px;font-family:comic sans MS;'>View Product</a>
                    </p>
                    <p class='card-text'><small class='text-muted'>uploaded on $show_product_time</small></p> 
                  </div>
                </div>
              </div>
        </div><br><br>
              ";
          }
        }
        if($_POST['sort_products'] == "donate")
        {
          $donate_query = "select * from products where product_mode = 'Donate'";
          $run_donate_query = mysqli_query($con, $donate_query);
          while($data = mysqli_fetch_array($run_donate_query))
          {
              $show_product_id = $data['product_id'];
              $show_product_name = $data['product_name'];
              $show_product_image = $data['product_image'];
              $show_product__description = $data['product_description'];
              $show_product_time = $data['product_time'];
              $show_product_mode = $data['product_mode'];
              $show_product_owner_id = $data['product_owner_id'];
          
              echo "
              <div class='card mb-3' style='max-width: 800px; height:250px;position: relative;left:15%;box-shadow: 10px 10px 10px 10px #ddd;'>
              <div class='row no-gutters'>
                <div class='col-md-4'>
                  <img src='product_images/$show_product_image' class='card-img' alt='' style='height:250px;'>
                </div>
                <div class='col-md-8'>
                  <div class='card-body text-center'>
                    <h5 class='card-title'><b>$show_product_name</b></h5>
                    <p class='card-text'>
                      <div class='badge badge-danger mt-3'><h4>$show_product_mode</h4></div>
                      <a href='product_details.php?product_id=$show_product_id' class='nav-link mt-3' style='font-size:20px;font-family:comic sans MS;'>View Product</a>
                    </p>
                    <p class='card-text'><small class='text-muted'>uploaded on $show_product_time</small></p> 
                  </div>
                </div>
              </div>
        </div><br><br>
              ";
          }
        }
        if($_POST['sort_products'] == "all")
        {
          $all_query = "select * from products order by product_id desc";
          $run_all_query = mysqli_query($con, $all_query);
          while($data = mysqli_fetch_array($run_all_query))
          {
              $show_product_id = $data['product_id'];
              $show_product_name = $data['product_name'];
              $show_product_image = $data['product_image'];
              $show_product__description = $data['product_description'];
              $show_product_time = $data['product_time'];
              $show_product_mode = $data['product_mode'];
              $show_product_owner_id = $data['product_owner_id'];
          
              echo "
              <div class='card mb-3' style='max-width: 800px; height:250px;position: relative;left:15%;box-shadow: 10px 10px 10px 10px #ddd;'>
              <div class='row no-gutters'>
                <div class='col-md-4'>
                  <img src='product_images/$show_product_image' class='card-img' alt='' style='height:250px;'>
                </div>
                <div class='col-md-8'>
                  <div class='card-body text-center'>
                    <h5 class='card-title'><b>$show_product_name</b></h5>
                    <p class='card-text'>
                      <div class='badge badge-danger mt-3'><h4>$show_product_mode</h4></div>
                      <a href='product_details.php?product_id=$show_product_id' class='nav-link mt-3' style='font-size:20px;font-family:comic sans MS;'>View Product</a>
                    </p>
                    <p class='card-text'><small class='text-muted'>uploaded on $show_product_time</small></p> 
                  </div>
                </div>
              </div>
        </div><br><br>
              ";
          }
        }  
    }


    
    // search functionality :

    if(isset($_POST['search_btn']))
    {
      $get_query = $_POST['search_area'];
      $search_query = "select * from products where product_name LIKE '%$get_query%'";
      $run_search_query = mysqli_query($con, $search_query);
      $search_data = mysqli_num_rows($run_search_query);
      if($search_data > 0)
      { 
        echo "<script>alert('$search_data related data found')</script>"; 
        header("location:signup.php"); 
      }
      else
      {
        echo "<script>alert('No related data found')</script>";
      }
    }

?>

<br><br>
  
</div>
<br><br><br>
  
    <div class="container text-center">
        <a href="#logo" class="nav-link" style="color:#888888;"><h3><b>BACK-TO-TOP</b></h3></a>
    </div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117371.19519779802!2d79.89871245216426!3d23.175679611631512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3981ae1a0fb6a97d%3A0x44020616bc43e3b9!2sJabalpur%2C%20Madhya%20Pradesh!5e0!3m2!1sen!2sin!4v1570875662233!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

<br>
<!--                   <p class="text-center mb-0"><b>MongersClub</b></p>				-->
		
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
    
</body>

<script>
      
    $(document).ready(function()
    {

        $("body").animate({opacity:'1'}, 2000);

        $(".spinner-border").animate({opacity:'0'}, 1000);

        //$(".modal").show(20000);

        setInterval(function()
        {
          $(".modal").show();
        }, 13000);

        $(".close").click(function()
        {
            $(".modal").slideUp(1000);
        
        });
    
    });
</script>
</html>