<!DOCTYPE html>
<html>
<head> 
	<link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/home-page.css">
	<style type="text/css">
		.card {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			max-width: 300px;
			margin: auto;
			text-align: center;
			font-family: arial;
			overflow: hidden;
		}

		.price {
			color: black;
			font-size: 22px;
		}

		.card button {
			border: none;
			outline: 0;
			padding: 12px;
			color: white;
			background-color: green;
			text-align: center;
			cursor: pointer;
			width: 100%;
			font-size: 18px;
		}
		.card button:hover {
			opacity: 0.7;
		}
	</style>
</head>
<body>  
	<?php include "include/conn.php";?>
	<br>
    <div class="headersection template clear">
        <div style="text-align: right; margin-top: 3px;">
            <button class="btnpg" type="button" name="btnGarments" id="btnGarments">For Garments</button>
            <button class="btnpg" type="button" name="btnBuyers" id="btnBuyers">For Buyers</button>
            <button class="btnpg" type="button" name="btnSignIn" id="btnSignIn">Sign In</button>
            <button class="btnpg" type="button" name="btnSignUp" id="btnSignUp">Sign Up</button>

        </div>

        <div class="logo">
            <a href="#"><img src="img/logo.png" alt="Logo"/></a>
            <h2>All Garments in One Place</h2>
            <div class="midsection template">
                <input type="text" name="search" id="searchBox" value="" placeholder="Search Product">
            </div>
        </div>

    </div>
    <div class="navsection template clear">
        <div class="leftsection">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="buy-now.php">Offers</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Garments</a></li>
            </ul>
        </div>

        <div class="rightsection">
            <ul>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>

    </div>


	<h1><center> <br> Product List </center></h1>

	<div style="padding-left:20px;">
		<?php 
			$sql="select * from product ";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_array($result)) {   
				echo '
				<div class="product-box">
					<div class="card">
					<img src="./img/product/'.$row['image'].'"  style="height:300px;">
					<h3 style="height:40px;overflow:hidden;"><a href="./productdetails.php?id='.$row['id'].'">'.$row['name'].'</a></h3>
					<p class="price">'.$row['price'].' $</p>
					
					<p><button onclick="window.location.href=\'./buy-now.php?id='.$row['id'].'\'">Buy Now</button></p>
					</div>
					
					
				</div>';
			}  
		?> 
	</div> 
</body>
</html>