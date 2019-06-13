
<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
		<style type="text/css">
			fieldset{
				margin-top: 100px;
				width: 350px;
				background-color: #cccccc;
				border:2px solid gray;
				box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
				border-radius: 2px;
			}
			form{
				text-align: left;
			}
			input{
				padding: 10px;
				width: 325px;
			}
			input:hover{
				background-color: #cccccc;
				border: 2px solid black;
			}

			.button{
				width: 350px;
				border-color: black;
				padding: 15px;
			}
			.button:hover
			{
				background-color: #555555;
				border-color: black;
			}

		</style>


	</head>
	<body>
		<?php 
			include "welcome.php";
		?>

		<center>
			<fieldset>
				<form method="post" action="welcome.php">
						<label>First Name : </label><br>
						<input type="text" name="fname" placeholder="Enter First Name"><br><br>

						<label>Last Name : </label><br>
						<input type="text" name="lname" placeholder="Enter Last Name"><br><br>

						<label>Email ID : </label><br>
						<input type="email" name="email" placeholder="example@gmail.com"><br><br>

						<label>Mobile No. : </label><br>
						<input type="number" name="mobile" placeholder="Enter Mobile Number"><br><br>

						<label>Username :</label><br>
						<input type="text" name="username" placeholder="Create Username"><br><br>

						<label>Password : </label><br>
						<input type="password" name="password" placeholder="Create Password"><br><br>

						<label>Confirm Password : </label><br>
						<input type="password" name="password" placeholder="Enter Confirm Password"><br><br>
						
						<input type="submit" name="submit" class = "button">

				</form>
			</fieldset>

		</center>
	</body>
</html>


