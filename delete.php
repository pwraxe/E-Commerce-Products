<?php

	$url = $_SERVER['REQUEST_URI'];			
	$seg = explode('/', $url);
	$id =  $seg[3] ;

	$Connect = mysqli_connect("localhost", "root", "","axeproducts") ;
	if(mysqli_connect_error())
		echo "fail to connect".mysqli_connect_error();



	$sql = "DELETE FROM products where id = '$id'; ";

	//$result = mysqli_query($Connect,$sql);
	if(mysqli_query($Connect,$sql))
	{
		header("Location: http://localhost/1010/index.php"); /* Redirect browser */
		exit();
	}
	else {
		echo "ERROR TO INSERT";
	}

// $delete = "DELETE FROM `axeproducts`.`products` WHERE `products`.`id` = 38"

?>