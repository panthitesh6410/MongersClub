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
        <li class="nav-item active ml-3">
          <a class="nav-link" href="chat_page.php">All Chats<span class="sr-only">(current)</span></a>
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
                <a href="review.php" class="nav-link mt-1"><h5>Write a Review</h5></a>
            </div>
            <div class="col-sm-7" style="border:3px solid #888888;">
                <div class="row">
                    <!-- reciever's name -->

<?php
  $USER = $_GET['user'];
  // echo"<script>alert($USER)</script>";
  $recevier_query = "select * from users where user_id ='$USER'";
  $run_recevier_query = mysqli_query($con, $recevier_query);
  $recevier_data = mysqli_fetch_array($run_recevier_query);
  $recevier_id = $recevier_data['user_id'];
  // echo "<script>alert($recevier_id)</script>";
  $recevier_name = $recevier_data['user_name'];
  $recevier_profile_pic = $recevier_data['user_profile_picture'];
?>
                    
                    <nav class="container navbar bg-secondary" style="color:#fff;">
                      <img src="user_images/<?php echo $recevier_profile_pic; ?>" class="ml-3" alt="" height=50 width=50 style="border-radius:200px;">
                      <h3 class="text-center mr-5" style="font-family:verdana;"><?php echo $recevier_name; ?></h3>
                    </nav>
                </div>
                <div class="row">
                    <!-- send input and btn -->
                    <form class="form-inline mt-3 mb-3" action="chat_room.php" method="POST" style="position:relative;left:30%;">
                        <input type="text" class="form-control" name="msg_content" placeholder="write a message">
                        <input type="submit" name="send_btn" class="btn btn-warning ml-2" value="SEND">
                    </form>
                </div>

<?php
  // echo "<script>alert($recevier_id)</script>";
      if(isset($_POST['send_btn']))
      {
          $chat_content = $_POST['msg_content'];
          $chat_time = date("Y/m/d h:i:s:a");
          $chat_sender = $userID;
          $chat_recevier = $recevier_id;
          
          $send_query = "insert into chats (chat_body, chat_time, chat_sender_id, chat_receiver_id) values ('$chat_content', '$chat_time', '$chat_sender', '$chat_recevier')";
          $run_send_query = mysqli_query($con, $send_query);
          if($run_send_query)
          {
            echo "<script>alert('message sent successfully')</script>";
          }
          else
          {
            echo "<script>alert('error in connection')</script>";
          }
      }

?>
                <div class="">
                    <!-- message contents in descending order of date or id -->
                    <?php
                        $display_chat = "select * from chats where (chat_sender_id='$userID' and chat_receiver_id='$recevier_id') or (chat_sender_id='$recevier_id' and chat_receiver_id='$userID')";
                        $run_display_chat = mysqli_query($con, $display_chat);
                        while($display = mysqli_fetch_array($run_display_chat))
                        {
                          $time = $display['chat_time'];
                          $chat = $display['chat_body'];
                          $uid = $display['chat_sender_id'];
                          if($userID != $uid)
                          {
                            echo "<h5 class='row mt-3 alert alert-danger ml-1 mr-1' style='font-family:verdana;'>$chat <small class='badge badge-danger ml-5'>$time</small> </h5>";
                          }
                          else{
                            echo "<h5 class='row alert alert-success ml-1 mr-1' style='font-family:verdana;'>$chat <small class='badge badge-success ml-5'>$time</small> </h5>";
                          }
                        }
                    ?>
                </div>
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