

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
<script src="jsb/sweetalert.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- 
Linking Externall css file and 
media=all :Used for all media type devices.
-->
  <link href="style.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
   

<body style="background-color:blanchedalmond;">

  <div class="user">
   
    
   <a href="index1.php"><i style="float: right;margin-top: 20px;margin-right: 40px;font-size: 20px;" class="fas fa-home"></i></a>
   <div class="center">
    
    <h2 style="text-align: center;margin-left: 50px;" class="span">welecome to admin login</h2>
    <form method="POST" name="myForm" onsubmit="return formValidate()" autocomplete="off">
      <div class="inputbox">
    <i class="fas fa-user icon2"></i>
    <input class="input1" type="text" placeholder="user name" name="username" id="username"><br><br></div>
    <div class="inputbox">
    <i class="fas fa-lock icon2"></i>
    <input class="input1" type="password" placeholder="Enter password" name="pass" id="pass">
   </div>
   <a href="admin-forgotpass.php">forgot password?</a>
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
  $username=$_POST['username'];
  $pass=$_POST['pass'];

  $sql="select * from admin where username='$username' and pass='$pass'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_num_rows($result);
  
  if($row==1)
  {
    $_SESSION['username']=$username;
    header('location:Admin/db.php');
    exit;
  }
  else{
    echo "<script>";
    echo "swal('Sorry','Invalid Username and Password','info')";
    echo "</script>";
  }
}
?>
