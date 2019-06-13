<?php
	//include "welcome.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>

		<style type="text/css">


			fieldset{
				width: 350px;
				border:2px solid green;
				position:static;
			}

			form{
				text-align: left;
			}
			input{
				padding: 8px;
				width: 350px;
			}

			p{
				font-size: 30px;
				text-align: center;
			}

			.button{
				background-color: white;
				border-color: black;
				width: 350px;
				text-align: center;
				padding: 15px;

			}
			.button:hover{
				background-color: #111111;
				color: white;
			}

		</style>


	</head>
	<body>

		<div>
			<?php
			include "welcome.php";
		?>
		<center>
			<br><br><br><br><br><br>
			<fieldset>
				<h1><center>Product Details</center></h1>
				<form action="#" method="post" enctype="multipart/form-data">

					<label>Product  category: </label><br>
					<input type="text" name="product_category" placeholder="Ex. Electronix, Furniture, Book, Sports" required><br><br>

					<label>Product  Code : </label><br>
					<input type="text" name="product_code" placeholder="Define Your Own Code" required><br><br>
					
					<label>Product Name : </label><br>
					<input type="text" name="product_name" placeholder="Name of Products" required><br><br>

					<label>Product  Price: </label><br>
					<input type="text" name="product_price" placeholder="Define Product Budget" required><br><br>

					<label>Product  Warrenty: </label><br>
					<input type="text" name="product_warrenty" placeholder="Define Quality in year" required><br><br>

					<label>Product Photo : </label><br>
					<input type="file" name="file"><br><br>
					<input type="submit" name="submit" class="button">

				</form>

			</fieldset>

		</center>



		</div>

		<?php

		if ($_SERVER['REQUEST_METHOD'] == "POST") 
		{
			$p_category = $_POST['product_category']; 
			$p_code = $_POST['product_code'];
			$p_name = $_POST['product_name'];
			$p_price = $_POST['product_price'];
			$p_warrenty = $_POST['product_warrenty'];
			$p_photo = $_FILES['file']['name'];

			//print_r($_FILES['file']);
			$fileName = $_FILES['file']['name'];		//filename.ext
			$filePath = $_FILES['file']['tmp_name'];

			
			$newPath = "C:/wamp/www/1010/images/".$fileName;
			move_uploaded_file($filePath, $newPath);

			$Connect = mysqli_connect("localhost", "root", "","axeproducts") ;
			if(mysqli_connect_error())
				echo "fail to connect".mysqli_connect_error();

			$sql = "insert into products  (id, category,code,name,price,image,warranty) values (null, '$p_category','$p_code','$p_name','$p_price','$fileName','$p_warrenty');";
			//$result = mysqli_query($Connect,$sql);
			if(mysqli_query($Connect,$sql))
			{
				header("Location: http://localhost/1010/index.php"); /* Redirect browser */
				exit();
			}
			else {
				echo "ERROR TO INSERT";
			}


//-----------------------------------------------------------------------------------------------

			$data = "SELECT image FROM products";
			$result = mysqli_query($Connect,$data);
			while ($row = mysqli_fetch_assoc($result)) 
			{

				//echo "C:/wamp/www/1010/images/".$row['image']."<br>";
			}
			mysqli_free_result($result);
		}


		?>






			

	</body>
</html>




















		<?php
		/*

		//error_reporting(0);
		$Connect = mysqli_connect("localhost", "root", "","axeproducts") ;
		if(mysqli_connect_error())
			echo "fail to connect".mysqli_connect_error();

		$sql = "SELECT * FROM products";
		$result = mysqli_query($Connect,$sql);

		
		while ($row = mysqli_fetch_assoc($result)) 
		{

			echo " ID : ".$row["id"] . "<br> Name : " .$row["name"] . "<br> Price : ".$row["price"] . "<br> Warranty : ".$row["warranty"]." Years<br>";
			echo "<br>";
			
		}
		mysqli_free_result($result);
*/
		?>