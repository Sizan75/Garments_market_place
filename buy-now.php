<!DOCTYPE html>
<html>
<head> 
	<link rel="stylesheet" href="./css/style.css">
  <style type="text/css">
    input[type=text]{
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }
	#address{
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
	<?php 
		include './header.php'; 
		if(!isset($_SESSION['user_id'])){
			header("Locaation: /login.php");
		}
	?> 
  <div class="body">
    <form method="post"> 

 	 <label id="name">Name</label>
      <input type="text" id="name" name="name" required placeholder="Your Name">

      <label for="address">Your Address</label>
      <textarea id="address" name="address" placeholder="Your Full Address"> </textarea> 
      <input type="hidden" name="p_id" value="<?php echo $_GET['id']; ?>">
      <input type="submit" value="Order" name="submit">


      <div style="margin-top: -3px;padding: 12px">
        <?php 
          if(isset($_POST['submit'])){
              $name=$_POST['name'];
              $address=$_POST['address'];  
              $sql="insert into orders(product_id,price,name,address,user_id) 
              (select id as product_id, price,'$name' as name, '$address' as address, '".$_SESSION['user_id']."' as user_id from product where id=".$_POST['p_id'].")";
              if($conn){
                if(mysqli_query($conn, $sql)){  
                  echo "
                  <script>
                    alert('Order Successfully');
                    window.location.href='./order.php';
                  </script>";
                }else{
                  echo "Something Went Worng. Try Again";
                }
              }
          }
        ?>
      </div>
    </form> 
</form>
  </div>

</body>
</html>
