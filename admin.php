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
    </style>
</head>
<body>
    
    <div class="row" >
        <div class="col-sm-4 text-center alert alert-primary"><a href="#" onclick="view1()">Users</a></div>
        <div class="col-sm-4 text-center alert alert-warning"><a href="#" onclick="view2()">Products</a></div>
        <div class="col-sm-4 text-center alert alert-secondary"><a href="#" onclick="view3()">Reviews</a></div>
    </div>

        <h1 id="h1">SELECT AN OPTION</h1>

    <div class="row alert alert-primary" id="users">
        <?php 
            echo "<div class='col-sm-9'>User content</div>
            <div class='col-sm-1'><button class='btn btn-success'>Insert</button></div>
            <div class='col-sm-1'><button class='btn btn-warning'>Update</button></div>
            <div class='col-sm-1'><button class='btn btn-danger'>Delete</button></div>";
        ?>
    </div>
    <div class="row alert alert-warning" id="products">
        <?php 
            echo "<div class='col-sm-9'>Product content</div>
            <div class='col-sm-1'><button class='btn btn-success'>Insert</button></div>
            <div class='col-sm-1'><button class='btn btn-warning'>Update</button></div>
            <div class='col-sm-1'><button class='btn btn-danger'>Delete</button></div>";
        ?>
    </div>
    <div class="row alert alert-secondary" id="reviews">
        <?php 
            echo "<div class='col-sm-9'>Review content</div>
            <div class='col-sm-1'><button class='btn btn-success'>Insert</button></div>
            <div class='col-sm-1'><button class='btn btn-warning'>Update</button></div>
            <div class='col-sm-1'><button class='btn btn-danger'>Delete</button></div>";
        ?>
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

</body>
</html>