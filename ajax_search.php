<?php

$con = mysqli_connect("localhost", "root", "", "minor2");

if(isset($_POST["query"]))
{
    $input = $_POST["query"];
    $output = "";
	$sql = "select * from products where product_name LIKE '%".$input."%'";
	$run_sql = mysqli_query($con, $sql);
	if(mysqli_num_rows($run_sql) > 0)
	{
		while($data = mysqli_fetch_array($run_sql))
		{
			$product_name = $data["product_name"];
			$output .= "<p class='alert alert-light'>".$product_name."</p>";
		}
    }
    echo $output;
}

?>