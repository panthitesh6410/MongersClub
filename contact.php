<?php
    $con = mysqli_connect("localhost", "root", "", "minor2");
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
          <a class="nav-link" href="index.php" onclick="audio_play()">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="btn btn-warning" href="signup.php" onclick="audio_play()">SignUp<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="btn btn-primary" href="login.php" onclick="audio_play()">Login<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ml-3">
          <a class="nav-link" href="blog.php" onclick="audio_play()">Rate Us/Blog<span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 mr-5" method="POST">
        <input class="form-control mr-sm-2 " id="search_field" autocomplete="off"  type="search" placeholder="Search" name='search_area' aria-label="Search">
      </form>
      <input id="mode" type="button" class="btn btn-light" value="Dark-Mode" onclick="change()">
    </div>
  </nav>
    
  <div id="show_search" class="alert alert-secondary" style="font-family:verdana;width:300px;position:absolute;left:72%;top:7%;"></div>

    <div class="jumbotron jumbotron-fluid text-center bg-light">
        <img class="logo mb-1" id="logo" src="images/logo.png" alt="logo" height="350" width="700">
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

	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117371.19519779802!2d79.89871245216426!3d23.175679611631512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3981ae1a0fb6a97d%3A0x44020616bc43e3b9!2sJabalpur%2C%20Madhya%20Pradesh!5e0!3m2!1sen!2sin!4v1570875662233!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>


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

    <audio src="audio/ring.mp3" id="play_audio"></audio>
      <script>
        function audio_play()
        {
          document.getElementById("play_audio").play();
        }
      </script>

    <script src="js/dark-mode.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script>
      $(document).ready(function()
      {
        $("body").animate({opacity:'1'}, 2000);
      });
    </script>
    <script>
    $("#search_field").keyup(function(){
        var query = $(this).val();
         if(query != '')
         {
           $.ajax({
             url: "search.php",
             method: "POST",
             data: {query:query},
             success: function(data){
               $("#show_search").html(data);
             }
           });
         }
         else
        {
          $("#show_search").html('');
        }
    })
  </script>

</body>
</html>