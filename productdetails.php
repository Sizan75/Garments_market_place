<!DOCTYPE html>
<html>
<head> 
	<link rel='stylesheet' href='./css/style.css'>
	<link rel='stylesheet' href='./css/product-info.css'>
</head>
<body>
	<?php include './header.php'; 
	$sql="select * from product where id=".$_GET['id']; 
	$result = mysqli_query($conn, $sql);
	if($row = mysqli_fetch_array($result)) {   
		echo "
		<div>
			<main class='container'> 
				<div class='left-column'>
					<img data-image='black' class='active' src='./img/product/".$row['image']."' alt=''> 
				</div> 
				<div class='right-column'> 
					<div class='product-description'> 
						<h2>".$row['name']."</h2>
						<h4>Available Size: " .$row['size']."</h4>
						<h4>Available Colours: ".$row['colour']."</h4>
						<p>".$row['discription']."</p>
					</div>   
					<div class='product-price'>
						<span>".$row['price']." $</span>
						<a href='./buy-now.php?id=".$row['id']."' class='cart-btn'>Buy Now</a>
					</div>
				</div>
			</main>
		</div>
		";
	}   
	?> 
</body>
</html>
