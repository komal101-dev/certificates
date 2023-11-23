<?php
$conn = mysqli_connect("localhost", "root", "", "cms");
?>






<html>

<head>
  <title>CMS</title>
  <!--
Setting logo for title bar and image size should be 50X50.
-->
  <link rel="shortcut icon" href="IMAGES/logoK.jpg" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
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
  <script src="jsb/sweetalert.min.js"></script>
  <script>
    function formValidation() {
      var name = document.getElementById("cname").value;
      var email = document.getElementById("email").value;
      var query = document.getElementById("query").value;
      var namepattern =/^[A-Za-z\s]+$/;
      var emailpattern = /^[A-Za-z0-9._]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;

      //username validation code
      if(name=="" || name.length<3 || name.length>15)
		 {
			  alert("Please provide a valid name");
			  document.myForm.username.focus();
			  document.myForm.username.style.border="solid 3px red";
			  return false;
		 }
         if(!name.match(namepattern))
		 {

			alert( "Please provide your username!" );
            document.myForm.username.focus();
			document.myForm.username.style.border="solid 2px red";
            return false;
		 }
      //email validation
      if (email == "") {
        alert("Please enter valid email");
        document.myForm.mail.focus();
        document.myForm.mail.style.border = "solid 2px red";
        return false;
      }
      if (!email.match(emailpattern))
       {
        alert("Please enter valid email");
        document.myForm.mail.focus();
        document.myForm.mail.style.border = "solid 2px red";
        return false;
      }
      //text area
      if (query == "")
       {
        alert("Please enter your query");
        document.myForm.message.focus();
        document.myForm.message.style.border = "solid 2px red";
        return false;
      }

     
    }
  </script>
</head>

<body>
  <!--header-->
  <header>
    <a href="#" class="logo">
      <img src="IMAGES/modify2.png" style="height:70px;width:70px;border-radius:20px;"></img>
    </a>
    <div class="navbar">
      <a href="index1.php"><i class=" fas fa-home"></i> Home</a>
      <a href="about.php"><i class="fas fa-user"></i> About-us</a>
      <a class="active" href="#contact"><i class="fas fa-users"></i> Contact-us</a>

      <div class="dropdown">
        <button class="dropbtn">Sign-In</button>
        <div class="dropdown-content">
          <a href="User.php">User Sign-in</a>
          <a href="Admin.php">Admin Sign-in</a>
        </div>
      </div>

    </div>
  </header>
  <!-- end of header-->

  <!--menu/navigation bar-->
  <!--end of menu/navigation bar-->
  <!--start of slider css --
<!--Start of contact-->

  <div class="container1">
    <div class="content1">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Arun, NP12</div>
          <div class="text-two">Arun-nagar 06</div>
        </div>

        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+0098 9893 5647</div>
          <div class="text-two">+0096 3434 5678</div>
        </div>

        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">SJPN@gmail.com</div>
          <div class="text-two">info.codinglab@gmail.com</div>
        </div>
      </div>
      <!--Left side is closed-->

      <div class="mid">

      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>

        <p>If you have any work from me or any types of quries related to my tutorial, you can send me message from
          here. It's my pleasure to help you.</p>

        <form method="POST" onsubmit="return formValidation()" name="myForm">
          <div class="input-box">
            <input type="text" name="username" placeholder="Enter your name" id="cname" />
          </div>

          <div class="input-box">
            <input type="text" name="mail" placeholder="Enter your email" id="email" />
          </div>

          <div class="input-box message-box">
            <textarea name="message" placeholder="Enter your message" id="query"></textarea>
          </div>

          <div class="button">
            <input type="submit" name="send" value="Send Now" />
          </div>

        </form>

      </div>
      <!-- Right side is closed-->

    </div><!-- content1 is closed-->
  </div><!-- Container1 is closed-->



  <!--start of footer -->
  <footer>
    <p>&copy; 2023. All rights reserved | Design by komal & prajyota(Mob-9019991378).</p>
  </footer>


  <!--end of footer -->


  <?php

  if (isset($_POST['send'])) {


    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $message = $_POST['message'];

    $sql = "insert into query values('$username','$mail','$message')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script>";
      echo "swal('Good Job','your query has been send successfully','success');";

      echo "</script>";
    } else {
      echo "<script>";
      echo "swal('oops!!','your query has not send ','error');";
      echo "</script>";
    }

  }

  ?>
</body>

</html>