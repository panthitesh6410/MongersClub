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

    </style>
</head>
<body>
    
    <div class="row" >
        <div class="col-sm-4 text-center alert alert-primary"><a href="#" onclick="view1()">Users</a></div>
        <div class="col-sm-4 text-center alert alert-warning"><a href="#" onclick="view2()">Products</a></div>
        <div class="col-sm-4 text-center alert alert-dark"><a href="#" onclick="view3()">Reviews</a></div>
    </div>
    <div class="row users">
        <?php 
            echo "<div class='col-sm-9'>User content</div>
            <div class='col-sm-1'><button class='btn btn-success'>Insert</button></div>
            <div class='col-sm-1'><button class='btn btn-warning'>Update</button></div>
            <div class='col-sm-1'><button class='btn btn-danger'>Delete</button></div>";
        ?>
    </div>
    <div class="row products">
        <?php 
            echo "<div class='col-sm-9'>Product content</div>
            <div class='col-sm-1'><button class='btn btn-success'>Insert</button></div>
            <div class='col-sm-1'><button class='btn btn-warning'>Update</button></div>
            <div class='col-sm-1'><button class='btn btn-danger'>Delete</button></div>";
        ?>
    </div>
    <div class="row reviews">
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
            //alert("users");
            // display:none for products and reviews here
            // display:users here.
        }
        function view2(){
            alert("products");
            // display:none for users and reviews here
            // display:products here.
        }
        function view3(){
            alert("reviews");
            // display:none for products and users here
            // display:reviews here.
        }
    </script>

</body>
</html>