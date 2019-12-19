<?php
    $con = mysqli_connect("localhost","root","","minor2");
    if(isset($_POST["query"]))
    {
        $output = '';
        $sql_query = "select * from products where product_name LIKE '%".$_POST["query"]."%'";
        $run_query = mysqli_query($con, $sql_query);
        $output = '<ul class="list-unstyled">';
        if(mysqli_num_rows($run_query) > 0)
        {
            while($row = mysqli_fetch_array($run_query))
            {
                $output .= '<li style="border:2px solid #fff;padding:5px;background-color:#888888;">'.$row["product_name"].'</li>';
            }
        }
        else{
            $output .= '<li>No Match Found</li>';
        }
        $output .= '</ul>';
        echo $output;
    }
?>