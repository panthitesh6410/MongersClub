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
                        <td><button class='btn btn-primary'>UPDATE</button></td>
                        <td><form method='POST'><button class='btn btn-danger' name='delete_user'>DELETE</button></form></td>
                    </tr>
                    ";
                }
            ?>

            <?php
                if(isset($_POST['delete_user']))
                {
                    $delete_user = "delete from users where user_name = '$username' and user_password = '$userpassword'";
                    $run_delete_user = mysqli_query($con, $delete_user);
                    if($run_delete_user)
                        echo "<script>alert('deleted');</script>";
                    else    
                        echo "<script>alert('not deleted');</script>";    
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
                        <td><button class='btn btn-primary'>UPDATE</button></td>
                        <td><button class='btn btn-danger' name='delete_product'>DELETE</button></td>
                    </tr>
                    ";
                }
            ?>

            <?php
                if(isset($_POST['delete_product']))
                {
                    $delete_product = "delete from products where product_name = '$pro_name' and product_description = '$pro_description'";
                    $run_delete_product = mysqli_query($con, $delete_product);
                    if($run_delete_product)
                        echo "<script>alert('deleted');</script>";
                    else    
                        echo "<script>alert('not deleted');</script>";    
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
                    $review_content = $review_data['review_body'];
                    $review_time = $review_data['review_date'];
                    echo "
                    <tr>
                        <td>$review_content</td>
                        <td>$review_time</td>
                        <td><button class='btn btn-primary'>UPDATE</button></td>
                        <td><button class='btn btn-danger' name='delete_review'>DELETE</button></td>
                    </tr>
                    ";
                }
            ?>
            <?php
                if(isset($_POST['delete_review']))
                {
                    $delete_review = "delete from reviews where review_body = '$review_content' and review_date = '$review_time'";
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
        
       <?php
            
       ?>

</body>
</html>