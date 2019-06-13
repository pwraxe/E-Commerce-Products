

<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
		<style type="text/css">
			fieldset{
				
				width: 50%;
				padding: 30px;
				height: 200px;
				border:none;
			}

			input{
				padding: 20px;
				width: 250px;
				margin: 0px;
			}
			
			a:hover{
				background-color: black;
			}
				
			.addP:hover , .viewP:hover{
				background-color: white;
			}
			.buttons{
				margin-top: 20%;
			}
			
		</style>
			

	</head>
	<body>
		<?php	include "welcome.php"; ?>

		<center>
			<fieldset>
				<form class="buttons">
					<a href="http://localhost/1010/upload.php" class = "addP"><input type="button" name="addProducts" value = "Add Products"></a>
				</form>
				<form>
					<a href="http://localhost/1010/index.php" class="viewP"><input type="button" name="viewProducts" value = "View Products"></a>
				</form>

			</fieldset>

		</center>

	</body>
</html>


