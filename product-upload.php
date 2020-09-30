<!DOCTYPE html>
<html>
<head> 
	<link rel="stylesheet" href="./css/style.css">
  <style type="text/css">
    input[type=text],input[type=email],input[type=file], select{
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
<?php
include './header.php';
if($_SESSION['utype']=="garment"){
    echo "";
}else{
    die();
}
?>
<div class="body">
    <form method="post" enctype="multipart/form-data">
      <label for="name">Product Name</label>
      <input type="text" name="name" required placeholder="Product Name">

      <label for="discription">Product Discription</label>
      <input type="text" name="discription" required placeholder="Product Discription">

        <label for="colour">Colours</label>
        <input type="text" name="colour" required placeholder="Colours">
        <label for="size">Available Size</label>
        <input type="text" name="size" required placeholder="Available Size">

      <label for="price">Price</label>
      <input type="text" name="price" required placeholder="Your Price">

      <label for="photos">Choose Image</label>
      <input type="file" name="photos" placeholder="Your Phone">
      <input type="submit" value=" Upload " name="submit">
        <div style="margin-top: -3px;padding: 12px">
        <?php 
        if(isset($_POST['submit'])){
          $name=$_POST['name'];
          $discription=$_POST['discription'];
          $price=$_POST['price'];
          $size=$_POST['size'];
          $colour=$_POST['colour'];
          $photo_name=$_SESSION['user_id'].'_'.time().".png";

          $sql="insert into product(name,discription,price,image,size,colour) values('$name','$discription','$price','$photo_name','$size','$colour')";
          if($conn){
            print_r($_FILES);
            $tmp_name = $_FILES['photos']["tmp_name"];
            if(move_uploaded_file($tmp_name, "./img/product/$photo_name")){
              if(mysqli_query($conn, $sql)){
                echo "
                <script>
                alert('Upload Successfully');
                window.location.href='./product-upload.php';
                </script>";
              }else{
                echo "Something Went Wrong. Try Again";
              }
            }else{
              echo "Invalid Image. Try Again";
            }
          }
        }
        ?>
        </div>
    </form>
  </div>

</body>
</html>
