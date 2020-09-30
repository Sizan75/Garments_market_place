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
      <h3 align="center">Customer Registration</h3>
    <form method="post">
      <label for="fname">First Name</label>
      <input type="text" name="firstname" required placeholder="Your First Name">

      <label for="lname">Last Name</label>
      <input type="text" name="lastname" required placeholder="Your Last Name">

      <label for="email">Email</label>
      <input type="email" name="email" required placeholder="Your Email">

      <label for="phone">Phone</label>
      <input type="text" maxlength="14" minlength="11" required name="phone" placeholder="Your Phone">

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
              $password=$_POST['password']; 
              $sql="insert into user(firstname,lastname,email,phone,password) values('$firstname','$lastname','$email','$phone','$password')";
              if($conn){
                if(mysqli_query($conn, $sql)){ 
                  $_SESSION['user_id']=mysqli_insert_id($conn);
                  $_SESSION['firstname']=$_POST['firstname'];
                  $_SESSION['lastname']=$_POST['lastname'];
                  $_SESSION['email']=$_POST['email'];
                  $_SESSION['phone']=$_POST['phone'];
                  $_SESSION['utype']='client';
                  echo "
                  <script>
                    alert('Registration Successfully');
                    window.location.href='./';
                  </script>";
                }else{
                  echo "Something Went Worng. Try Again";
                }
              }
          }
        ?>
      </div>
    </form>
	<form method="get" action="garments_registration.php">
    <button type="submit">Click for Garments Registration</button>
</form>
  </div>

</body>
</html>
