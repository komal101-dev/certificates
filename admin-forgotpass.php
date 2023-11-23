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
<script src="jsb/sweetalert.min.js">
  </script>
  <link href="style.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <body style="background-color:blanchedalmond;">
    <div class="user">
     
      
     <a href="index1.php"><i style="float: right;margin-top: 20px;margin-right: 40px;font-size: 20px;" class="fas fa-home"></i></a>
     <div class="center">
      <h2 style="text-align: center;margin-left:50px;" class="span">welecome </h2>
      <form method="POST">
      <div class="inputbox">
      <i class="fas fa-user icon2"></i>
      <input class="input1" type="text" name="name" placeholder="user name"><br><br></div>
     
    </div>
    <div class="botton">
    <input class="forget" type="submit" name="change" value="VERIFY" style="
      float: right;
  
  margin-right: 80px;
  background-color:rgb(25, 146, 162);
  margin-top:40px;
  color:white;
  padding:10px 20px;
  outline: none;
  border:none;
  font-size:25px;
  font-family:monospace;
  border-radius:10px;
  cursor:pointer;
  font-weight:bold;"
       >
    </div>
    </div>
</form>
  
    <!--start of footer -->
    <footer>
      <p>&copy; 2023. All rights reserved | Design by komal & prajyota(Mob-9019991378).</p>
    </footer>
  
  
    <!--end of footer -->
  </body>
  
  </html>
  <?php
if(isset($_POST['change']))
{
 
   $username=$_POST['name'];

    $sql="select * from admin where username='$username'";
    $res=mysqli_query($conn,$sql);
    $rows=mysqli_num_rows($res);
    if($rows>0)
    {
         $row=mysqli_fetch_array($res);
         
         $pass=$row['pass'];
         echo"<script>";
         echo"swal('your password is $pass','success');";
         echo"</script>";
    }
    else{

      echo"<script>";
      echo"swal('SORRY!!!','error');";
      echo"</script>";
}
}
?>




















