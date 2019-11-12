<?php
    $con = mysqli_connect("localhost", "root", "", "minor2");

    $search_result = $_GET['search_result'];
    
    echo "
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <a href='index.php'><button class='btn btn-danger' style='position:fixed;margin:10px;'>Go Back</button></a>";



    $search_query = "select * from products where product_name LIKE '%$search_result%'";
    $run_search_query = mysqli_query($con, $search_query);
    $rows = mysqli_num_rows($run_search_query);
    if($rows > 0)
    {
        echo "<h1 class='mt-3' style='position:relative;left:40%;font-family:stencil;'>Data Found for '$search_result'</h1>";

        while($search_data = mysqli_fetch_array($run_search_query))
        {
            $show_product_id = $search_data['product_id'];
            $show_product_name = $search_data['product_name'];
            $show_product_image = $search_data['product_image'];
            $show_product__description = $search_data['product_description'];
            $show_product_time = $search_data['product_time'];
            $show_product_mode = $search_data['product_mode'];
            $show_product_owner_id = $search_data['product_owner_id'];

            echo "
            <div class='card' style='max-width: 800px; height:250px;position: relative;left:25%;box-shadow: 10px 10px 10px 10px #ddd;margin-top:3%;'>
            <div class='row no-gutters'>
                <div class='col-md-4'>
                <img src='product_images/$show_product_image' class='card-img' alt='' style='height:250px;'>
                </div>
                <div class='col-md-8'>
                <div class='card-body text-center'>
                    <h5 class='card-title' style='color:#000000;'><b>$show_product_name</b></h5>
                    <p class='card-text'>
                    <div class='badge badge-danger mt-3'><h4>$show_product_mode</h4></div>
                    <a href='product_details.php?product_id=$show_product_id' class='nav-link mt-3' style='font-size:20px;font-family:comic sans MS;'>View Product</a>
                    </p>
                    <p class='card-text'><small class='text-muted'>uploaded on $show_product_time</small></p> 
                </div>
                </div>
                </div>
            </div><br>
            ";
        }
    }
    else
        echo "<img src='images/not_found.jpg' style='position:absolute;left:40%;top:10%;'><span style='position:absolute;top:45%;left:22%;font-family:stencil;font-size:60px;'>No Data Found for '$search_result'</span>";
?>