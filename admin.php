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
    <title>Admin Panel</title>
    <style>
        #users,#products,#reviews{
            display:none;
        }
        h1{
            position: absolute;
            left: 40%;
            top: 50%;
        }
        B{
            COLOR: #000000;
            FONT-SIZE: 30px;
        }
        table{
            margin-left:30px;
        }
        table tr th{
            padding:20px;
        }
        table tr td{
            padding:20px;
        }
    </style>
</head>
<body>
    
    <div class="row" >
        <div class="col-sm-4 text-center alert alert-primary "><a href="#" onclick="view1()"><b>USERS</b></a></div>
        <div class="col-sm-4 text-center alert alert-warning"><a href="#" onclick="view2()"><B>PRODUCTS</B></a></div>
        <div class="col-sm-4 text-center alert alert-secondary"><a href="#" onclick="view3()"><B>REVIEW</B></a></div>
    </div>

        <h1 id="h1">SELECT AN OPTION</h1>

    <div class="row alert alert-primary" id="users">
        <table border=5>
            <tr>
                <th>USERNAME</th>
                <th>E-MAIL</th>
                <th>PASSWORD</th>
                <th>PHONE</th>
                <th>INSTITUTE</th>
                <th>PLACE</th>
                <th>GENDER</th>
            </tr>
            <?php
                $user_query = "select * from users";
                $run_user_query = mysqli_query($con, $user_query);
                while($user_data = mysqli_fetch_array($run_user_query))
                {
                    $userid = $user_data['user_id'];
                    $username = $user_data['user_name'];
                    $useremail = $user_data['user_email'];
                    $userpassword = $user_data['user_password'];
                    $userphone = $user_data['user_phone'];
                    $userinstitute = $user_data['user_institute'];
                    $userplace = $user_data['user_place'];
                    $usergender = $user_data['user_gender'];
                    echo "
                    <tr>
                        <td>$username</td>
                        <td>$useremail</td>
                        <td>$userpassword</td>
                        <td>$userphone</td>
                        <td>$userinstitute</td>
                        <td>$userplace</td>
                        <td>$usergender</td>
                        <td><input type='hidden' name='update_user_id' value='$userid'><button class='btn btn-primary' data-toggle='modal' data-target='#updation_user'>UPDATE</button></td>
                        <td><form method='POST'><input type='hidden' name='delete_user_id' value='$userid'><button class='btn btn-danger' name='delete_user'>DELETE</button></form></td>
                    </tr>
                    ";
                }
            ?>

            <?php
                if(isset($_POST['delete_user']))
                {
                    $u_id = $_POST['delete_user_id'];
                    $delete_user = "delete from users where user_id = '$u_id'";
                    $run_delete_user = mysqli_query($con, $delete_user);
                    if($run_delete_user)
                        echo "<script>alert('deleted');</script>";
                    else    
                        echo "<script>alert('error deleting');</script>";    
                }
            ?>
            
        </table>
    </div>
    <div class="row alert alert-warning" id="products">
    <table border=5>
            <tr>
                <th>PRODUCT NAME</th>
                <th>PRODUCT MODE</th>
                <th>PRODUCT DESCRIPTION</th>
                <th>UPLOAD DATE</tH>
            </tr>
            <?php
                $product_query = "select * from products";
                $run_product_query = mysqli_query($con, $product_query);
                while($product_data = mysqli_fetch_array($run_product_query))
                {
                    $pro_id = $product_data['product_id'];
                    $pro_name = $product_data['product_name'];
                    $pro_mode = $product_data['product_mode'];
                    $pro_description = $product_data['product_description'];
                    $pro_time = $product_data['product_time'];
                    echo "
                    <tr>
                        <td>$pro_name</td>
                        <td>$pro_mode</td>
                        <td>$pro_description</td>
                        <td>$pro_time</td>
                        <td><form action='' method='POST'><input type='hidden' name='update_product_id' value='$pro_id'><button class='btn btn-primary'>UPDATE</button></form></td>
                        <td><form action='' method='POST'><input type='hidden' name='delete_product_id' value='$pro_id'><button class='btn btn-danger' name='delete_product'>DELETE</button></form></td>
                    </tr>
                    ";
                }
            ?>

            <?php
                if(isset($_POST['delete_product']))
                {
                    $p_id = $_POST['delete_product_id'];
                    $delete_product = "delete from products where product_id = '$p_id'";
                    $run_delete_product = mysqli_query($con, $delete_product);
                    if($run_delete_product)
                        echo "<script>alert('deleted');</script>";
                    else    
                        echo "<script>alert('error deleting');</script>";    
                }
            ?>
        </table>
    </div>
    <div class="row alert alert-secondary" id="reviews">
    <table border=5>
            <tr>
                <th>REVIEW CONTENT</th>
                <th>UPLOAD DATE</tH>
            </tr>
            <?php
                $review_query = "select * from reviews";
                $run_review_query = mysqli_query($con, $review_query);
                while($review_data = mysqli_fetch_array($run_review_query))
                {
                    $review_id = $review_data['review_id'];
                    $review_content = $review_data['review_body'];
                    $review_time = $review_data['review_date'];
                    echo "
                    <tr>
                        <td>$review_content</td>
                        <td>$review_time</td>
                        <td><form action='' method='POST'><input type='hidden' name='update_review_id' value='$review_id'><button class='btn btn-primary'>UPDATE</button></form></td>
                        <td><form action='' method='POST'><input type='hidden' name='delete_review_id' value='$review_id'><button class='btn btn-danger' name='delete_review'>DELETE</button></form></td>
                    </tr>
                    ";
                }
            ?>
            <?php
                if(isset($_POST['delete_review']))
                {
                    $r_id = $_POST['delete_review_id'];
                    $delete_review = "delete from reviews where review_id = '$r_id'";
                    $run_delete_review = mysqli_query($con, $delete_review);
                    if($run_delete_review)
                        echo "<script>alert('deleted');</script>";
                    else    
                        echo "<script>alert('not deleted');</script>";    
                }
            ?>
        </table>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $("body").animate({opacity:"1"}, 2500);
        });
    </script>

    <script>
        function view1(){
            document.getElementById("users").style.display="block";
            document.getElementById("products").style.display="none";
            document.getElementById("reviews").style.display="none";
            document.getElementById("h1").style.display="none";
        }
        function view2(){
            document.getElementById("products").style.display="block";
            document.getElementById("users").style.display="none";
            document.getElementById("reviews").style.display="none";
            document.getElementById("h1").style.display="none";
        }
        function view3(){
            document.getElementById("reviews").style.display="block";
            document.getElementById("users").style.display="none";
            document.getElementById("products").style.display="none";
            document.getElementById("h1").style.display="none";
       }
    </script>
        

    <!-- PopUp Modal for user UPDATE functionality : -->

    <div id="updation_user" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Here</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

<!-- to update user info. -->
    <?php
        if(isset($_POST['save_username']))
        {
            $u_id = $_POST['update_user_id'];
            $new_username = $_POST['edit_username'];
            $query1 = "update users set user_name = '$new_username' where user_id = '$u_id'";
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
            $u_id = $_POST['update_user_id'];
            $new_email = $_POST['edit_email'];
            $query2 = "update users set user_email = '$new_email' where user_id = '$u_id'";
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
            $u_id = $_POST['update_user_id'];
            $new_password = $_POST['edit_password'];
            $query3 = "update users set user_password = '$new_password' where user_id = '$u_id'";
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
            $u_id = $_POST['update_user_id'];
            $new_phone = $_POST['edit_phone'];
            $query4 = "update users set user_phone = '$new_username' where user_id = '$u_id'";
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
            $u_id = $_POST['update_user_id'];
            $new_place = $_POST['edit_place'];
            $query5 = "update users set user_place = '$new_place' where user_id = '$u_id'";
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
            $u_id = $_POST['update_user_id'];
            $new_institute = $_POST['edit_institute'];
            $query6 = "update users set user_institute = '$new_institute' where user_id = '$u_id'";
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
            $u_id = $_POST['update_user_id'];
            $new_profile_picture = $_FILES['profile_picture']['name'];
            $temp_loc = $_FILES['profile_picture']['tmp_name'];
            $image_store = "user_images/".$new_profile_picture;
            move_uploaded_file($temp_loc, $image_store);
            $query7 = "update users set user_profile_picture = '$new_profile_picture' where user_id = '$u_id'";
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
    ?>
       
</body>
</html>