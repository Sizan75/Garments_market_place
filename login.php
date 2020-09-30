 <!DOCTYPE html>
<html>
<head> 
	<link rel="stylesheet" href="./css/style.css">
	<style type="text/css">
		input[type=text],input[type=email],input[type=password], select{
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-top: 6px;
			margin-bottom: 16px;
			resize: vertical;
		}

		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			position: absolute; 
			margin: 60px -85px;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}

		.body {
			border-radius: 5px; 
			padding-top: 20px; 
			padding-left: 30%; 
			padding-right: 30%;
		}
	</style>
</head>
<body>
	<?php include './header.php'; ?>
    \* */
	<div class="body">
		<form method="post"> 
			<label for="email">Email</label>
			<input type="email" name="email" required placeholder="Your Email"> 

			<label for="password">Password</label>
			<input type="password" maxlength="30" minlength="4" required name="password" placeholder="Your Password">

			<input type="submit" value="Sign In" name="submit">
			<div style="margin-top: -3px;padding: 12px">
				<?php 
				if(isset($_POST['submit'])){   
					$sql="select * from user where email='".$_POST['email']."' and password='".$_POST['password']."'";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_array($result)) {  
						$_SESSION['user_id']=$row['id'];
						$_SESSION['firstname']=$row['firstname'];
						$_SESSION['lastname']=$row['lastname'];
						$_SESSION['email']=$row['email'];
						$_SESSION['phone']=$row['phone'];
						$_SESSION['utype']=$row['utype'];
						echo "<script>window.location.href='./';</script>";
					} 
					echo "Email Or Password Not Match";
				}
				?>
			</div>
		</form>
	</div>

</body>
</html>
