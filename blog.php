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
          <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="btn btn-warning" href="signup.php">SignUp<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="btn btn-primary" href="login.php">Login<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="nav-link" href="contact.php">Contact Us <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 mr-5 ">
        <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0 mr-5" type="submit">Search</button>
      </form>
    </div>
  </nav>
    <br><br><br>
    <div class="container review text-center">
        <h2>Ratings  &  Reviews</h2>
        <img src="images/rnr.jfif" alt="rating&review" height=150>
        <p>We like to welcome your reviews and opinions Here.<br>Rate Us on the Basis of your Experience with Us</p>
        <p>Please <a href="login.php"><b>Login</b></a> to give your Reviews/Opinions or to Rate Us!  </p>
    </div>
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
                <div class='card user_review'>
                <div class='row mb-5'>
                    <div class='col-sm-4'>
                        <img src='user_images/$show_profile_pic' alt='' height=100 style='border-radius:500px;margin-left:55%;'>
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


    
<br>
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