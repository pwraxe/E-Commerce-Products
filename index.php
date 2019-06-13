<?php
	include "welcome.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
		<style type="text/css">
			
			.item_img{
				width:50px;
				height: 50px;
			}
			.edit{
				padding: 20px;
				width: 200px;
				margin-left: 20px;
				margin-bottom: 20px;
				font-size: 15px;
				font-family: Times New Roman;
			}

			div{
				
				display: flex;
				flex-wrap: wrap;

			}

			table td th
			{  
				border: 1px solid #111111;
				text-align: center;
			}
			table 
			{
  				border-collapse: collapse;
  				width: 100%;
			}

			th, td {
			  padding: 15px;
			}

			.edit
			{
				color: blue;
				width: 10px;
			}
			.edit:hover
			{
				background-color: white;
			}
	

		</style>
	</head>
	<body>
		<div>
			<br><br><br><br>
			<table border="1">
				<tr>
					<!-- <th>ID</th> -->
					<th>Category</th>
					<th>Code</th>
					<th>Name</th>
					<th>Price</th>
					<th>Warrenty</th>
					<th>Image</th>
					<th>Operation</th>


				</tr>
			<?php
				//include "welcome.php";
				getData();	

				function getData()
				{
					$Connect = mysqli_connect("localhost", "root", "","axeproducts") ;
					if(mysqli_connect_error())
					echo "fail to connect".mysqli_connect_error();


					$data = "SELECT * FROM products";
					$result = mysqli_query($Connect,$data);
					while ($row = mysqli_fetch_assoc($result)) 
					{
						
						//echo $counts;
						//echo "C:/wamp/www/1010/images/".$row['image']."<br>";
						$product_id = $row['id'];
						$product_category = $row['category'];
						$product_code = $row['code'];
						$product_name = $row['name'];
						$product_price = $row['price'];
						$product_image = $row['image'];
						$product_warrenty = $row['warranty'];



						// Display image 
						$Path = "C:/wamp/www/1010/images/".$row['image'];
						//echo $Path;
						$DisplayImg = " <img src = images/".$row['image']." class ='item_img' >";

						//$DisplayData = "Product ID : ".$product_id."<br> Product Category : ".$product_category."<br> Product Code : ".$product_code."<br> Product Name : ".$product_name."<br> Product Price : "." &#8377; ".$product_price."<br> Product Warrenty : ".$product_warrenty ." Year";

							
						echo "<tr>";
							//echo "<td>";  echo $product_id;  echo "</td>";
							echo "<td>";  echo $product_category;  echo "</td>";
							echo "<td>";  echo $product_code;  echo "</td>";
							echo "<td>";  echo $product_name;  echo "</td>";
							echo "<td>";  echo "&#8377; ".$product_price;  echo "</td>";
							echo "<td>";  echo $product_warrenty." Year";  echo "</td>";
							echo "<td>";  echo $DisplayImg;  echo "</td>";
							
							echo "<td>";  echo "<a  href = 'edit.php/".$row['id']."' class = 'edit' name = 'editB'>Edit </a>";

							echo "<a  href = 'delete.php/".$row['id']."' class = 'edit' name = 'editB'>Delete </a>";  echo "</td>";
							
							
						
						echo "<tr>";





							
					 }
					 mysqli_free_result($result);
				}
			?>

			</table>

		</div>
	</body>
</html>