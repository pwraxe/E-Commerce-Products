
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

			<?php
			
				$url = $_SERVER['REQUEST_URI'];
				
				$seg = explode('/', $url);
				$id =  $seg[3] ;
				$Connect = mysqli_connect("localhost", "root", "","axeproducts") ;
				if(mysqli_connect_error())
				echo "fail to connect".mysqli_connect_error();
				$sql = "SELECT * FROM products where id = ".$id;
				$result = mysqli_query($Connect,$sql);
				while ($row = mysqli_fetch_assoc($result)) 
				{

					 $ID = $row["id"];
					 $cate = $row["category"];
					 $code = $row["code"];
					 $Name = $row["name"];
					 $Price = $row["price"];
					 $warnty = $row["warranty"];

					 //echo "ID : ".$ID."<br> Category : ".$cate."<br> code ".$code."<br>name : ".$Name."<br> price : ".$Price."<br> warr  ".$warnty;	
					
				}
				mysqli_free_result($result);

			?>


		<center>
			<br><br><br><br><br><br>
			<fieldset>
				<p>Product Details</p>
				<form action="#" method="post" enctype="multipart/form-data">

					<label>Product  category: </label><br>
					<input type="text" name="product_category" value=" <?php echo $cate; ?> " require><br><br>

					<label>Product  Code : </label><br>
					<input type="text" name="product_code" value=" <?php echo $code; ?>" required><br><br>
					
					<label>Product Name : </label><br>
					<input type="text" name="product_name" value=" <?php echo $Name; ?>" required><br><br>

					<label>Product  Price: </label><br>
					<input type="text" name="product_price" value=" <?php echo $Price; ?> " required><br><br>

					<label>Product  Warrenty: </label><br>
					<input type="text" name="product_warrenty" value=" <?php echo $warnty; ?>" required><br><br>

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

			//$sql = "insert into products  (id, category,code,name,price,image,warranty) values (null, '$p_category','$p_code','$p_name','$p_price','$fileName','$p_warrenty');";
			$sql = "UPDATE products SET category = '$p_category', code = '$p_code', name = '$p_name', price = '$p_price', image = '$fileName', warranty = '$p_warrenty' where id = '$id'; ";

			//$result = mysqli_query($Connect,$sql);
			if(mysqli_query($Connect,$sql))
			{
				echo "OK";
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



