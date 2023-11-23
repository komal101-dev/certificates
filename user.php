<?php

session_start();
//database connection//
$conn= mysqli_connect("localhost","root","","cms");
?>
<html>
<head>
  <title>CMS</title>
  <!--
Setting logo for title bar and image size should be 50X50.
-->
  <link rel="shortcut icon" href="IMAGES/logoK.jpg" type="image/x-icon">

  <!-- 
viewport to make your website look good on all devices.
width=device-width:Depending on width of the device it takes width.
initial-scale=1.0:sets the initial zoom level when the page is first loaded by the browser.
-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- 
Linking Externall css file and 
media=all :Used for all media type devices.
-->
  <link href="style.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
   <script src="jsb/sweetalert.min.js"></script>

<body style="background-color:blanchedalmond;">
  <div class="user">
   
    
   <a href="index1.php"><i class="fas fa-home"></i></a>
   
   <div class="center">
    <h2 style="text-align: center;margin-left: 50px;" class="span">welecome to user login</h2>
  <form method="POST"  name="myForm" onsubmit="return formValidate()" autocomplete="off" enctype="multipart/form-data">
    <div class="inputbox">
    <i class="fas fa-user icon2"></i>
    <input class="input1" type="text" placeholder="Enter usn no" name="usn" id="usn"><br><br></div>
    <div class="inputbox">
    <i class="fas fa-lock icon2"></i>
    <input class="input1" type="password" placeholder="Default password is Welcome@123" name="pass" id="pass" >
   </div>
   <a href="user-forgotpass.php">forgot password?</a>
  </div>
  <div class="botton">
    <input class="login-button" type="submit" value="LOGIN" name="login">
  </div>
</form>
  </div>


  <!--start of footer -->
  <footer>
    <p>&copy; 2023. All rights reserved | Design by komal & prajyota(Mob-9019991378).</p>
  </footer>


  <!--end of footer -->
</body>

</html>
<?php
if(isset($_POST['login']))
{
  echo $usn=$_POST['usn'];
  echo $pass=$_POST['pass'];

  $sql="select * from student where usn='$usn' and password='$pass'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_num_rows($result);
  
  if($row==1)
  {
    $_SESSION['usn']=$usn;
    header('location:UserH.php/home.php');
    exit;
  }
  else{
    echo "<script>";
    echo "swal('Sorry','Invalid Usn no and Password','info')";
    echo "</script>";
  }
}
?>

