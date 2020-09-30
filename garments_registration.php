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
  <div class="body">
      <h3 align="center">Garments Registration</h3>
    <form method="post">
      <label for="fname">First Name</label>
      <input type="text" name="firstname" required placeholder="Your First Name">

      <label for="lname">Last Name</label>
      <input type="text" name="lastname" required placeholder="Your Last Name">

      <label for="email">Email</label>
      <input type="email" name="email" required placeholder="Your Email">

      <label for="phone">Phone</label>
      <input type="text" maxlength="14" minlength="11" required name="phone" placeholder="Your Phone">

        <label for="gname">Garments Name</label>
        <input type="text" required name="gname" placeholder="Garments Name">

        <label for="license_id">License ID</label>
        <input type="text" minlength="11" required name="license_id" placeholder="License ID">

      <label for="password">Password</label>
      <input type="password" maxlength="30" minlength="4" required name="password" placeholder="Your Password">

      <input type="submit" value="Sign Up" name="submit">
      <div style="margin-top: -3px;padding: 12px">
        <?php
          if(isset($_POST['submit'])){
              $firstname=$_POST['firstname'];
              $lastname=$_POST['lastname'];
              $email=$_POST['email'];
              $phone=$_POST['phone'];
              $licenseid=$_POST['license_id'];
              $garments_name=$_POST['gname'];
              $password=$_POST['password'];
              $utype='garment';
              $sql="insert into user(firstname,lastname,email,phone,password,license_id,garments_name,utype) values('$firstname','$lastname','$email','$phone','$password','$licenseid','$garments_name','$utype')";
              if($conn){
                if(mysqli_query($conn, $sql)){ 
                  $_SESSION['user_id']=mysqli_insert_id($conn);
                  $_SESSION['firstname']=$_POST['firstname'];
                  $_SESSION['lastname']=$_POST['lastname'];
                  $_SESSION['email']=$_POST['email'];
                  $_SESSION['phone']=$_POST['phone'];
                  $_SESSION['gname']=$_POST['garments_name'];
                  $_SESSION['licenseid']=$_POST['license_id'];
                  $_SESSION['utype']='garment';
                  echo "
                  <script>
                    alert('Registration Successfully');
                    window.location.href='./';
                  </script>";
                }else{
                  echo "Something Went Wrong. Try Again";
                }
              }
          }
        ?>
      </div>
    </form>
	
  </div>

</body>
</html>
