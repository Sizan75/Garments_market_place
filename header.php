<?php 
session_start();
include "include/conn.php";
 ?>
<div class="header">
	<a href="./" class="logo"> All Garments in One Place</a>
	<div class="header-right">
		<a class="active" href="./">Home</a>
		<?php 
			if(isset($_SESSION['user_id'])){ 
				if($_SESSION['utype']=="garment"){
					echo ' <a href="./product-upload.php">Upload</a>';
				}
				echo ' <a href="./order.php">Orders</a>';
				echo ' <a href="./logout.php">Log out</a>';
			}else{
				echo '
				 	<a href="./login.php">Log In</a>
					<a href="./customer_registration.php">Sign Up</a>
				';
			}
		?> 
	</div>
</div>