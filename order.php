 <!DOCTYPE html>
 <html>
 <head> 
 	<link rel="stylesheet" href="./css/style.css">
 	<style type="text/css">
 		#customers {
 			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
 			border-collapse: collapse;
 			width: 100%;
 		}

 		#customers td, #customers th {
 			border: 1px solid #ddd;
 			padding: 8px;
 		}

 		#customers tr:nth-child(even){background-color: #f2f2f2;}

 		#customers tr:hover {background-color: #ddd;}

 		#customers th {
 			padding-top: 12px;
 			padding-bottom: 12px;
 			text-align: left;
 			background-color: #4CAF50;
 			color: white;
 		}
 		img{
 			object-fit: cover;
 		}
 	</style>
 </head>
 <body>
 	<?php include './header.php'; ?> 
 	<div class="body" style="margin: 40px">
 		<table id="customers">
 			<tr>
 				<th>Image</th>
 				<th>Name</th>
 				<th>Price</th>
 				<th>Address</th>
 			</tr>
 			<?php 
				$sql="select o.*,p.name,p.image from orders o inner join product p on o.product_id=p.id where o.user_id=".$_SESSION['user_id'];
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_array($result)) {   
					echo '
					<tr>
		 				<td><img src="./img/product/'.$row['image'].'" width="100" height="100"/></td> 
		 				<td><a href="./productdetails.php?id='.$row['product_id'].'">'.$row['name'].'</a></td> 
		 				<td>'.$row['price'].'</td> 
		 				<td>'.$row['address'].'</td> 
		 			</tr> ';
				}  
			?>  
 		</table>
 	</div>

 </body>
 </html>
