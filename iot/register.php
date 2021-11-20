<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if (isset($_SESSION["username"])) {header ("location:index.php");}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>INDEX || IOT_SHOP</title>
  <title>Internet Of Things</title>
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="font.css">
  <link rel="stylesheet" href="style.css">
</head>
<body style="background-color:#36678F;">
  <header class="w3-container w3-teal w3-padding-16">
    <a href="index.php" style="text-decoration:none;"><h1 style="font-family:googlesans">INTERNET OF THINGS</h1></a>
  </header>

  <!-- Sidebar -->
  <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0;z-index:4;" id="rightMenu">
    <button onclick="closeRightMenu()" style="font-family:googlesans; font-size:18px; font-weight:bold;" class="w3-bar-item w3-button w3-large">Close &times;</button>
    <a href="index.php" style="font-family:googlesans; font-size:18px; font-weight:bold; "class="w3-bar-item w3-button">HOME</a>


    <!-- <?php
    if($_SESSION["type"]!="admin")
      {
        echo'<a href="products.php" style="font-family:googlesans; font-size:18px; font-weight:bold; "class="w3-bar-item w3-button">PRODUCTS</a>';
        echo'<a href="account.php" style="font-family:googlesans; font-size:18px; font-weight:bold; "class="w3-bar-item w3-button">MY ACCOUNT</a>';
        echo'<a href="orders.php" style="font-family:googlesans; font-size:18px; font-weight:bold; "class="w3-bar-item w3-button">MY ORDERS</a>';
        echo'<a href="cart.php" style="font-family:googlesans; font-size:18px; font-weight:bold; "class="w3-bar-item w3-button">VIEW CART</a>';
      }
    else if($_SESSION["type"]==="admin")
      {

        echo'<a href="admin.php" style="font-family:googlesans; font-size:18px; font-weight:bold; "class="w3-bar-item w3-button">UPDATE PRODUCTS</a>';
      }

    ?> -->

    <a href="contact.php" style="font-family:googlesans; font-size:18px; font-weight:bold;" class="w3-bar-item w3-button">CONTACT US</a>
  </div>

  <!-- overlay effect -->
  <div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

  <!-- openbutton -->
  <div class="w3-bar w3-light-grey">
    <button class="w3-button w3-light-grey w3-large w3-right" onclick="openRightMenu()"><b>&#9776;</b></button>
    <?php
    if(isset($_SESSION['username'])){
      echo '<a href="#" style="font-family:googlesans; font-size:20px; font-weight:bold;" class="w3-bar-item w3-button w3-right ">Hi, ' .$_SESSION['fname'] .'</a>';
      echo '<a href="logout.php" style="font-family:googlesans; font-size:20px; font-weight:bold;" class="w3-bar-item w3-button w3-right ">Logout</a>';
    }
    else{
      echo '<a href="login.php" style="font-family:googlesans; font-size:20px; font-weight:bold;" class="w3-bar-item w3-button w3-right ">Login</a>';
      echo '<a href="register.php" style="font-family:googlesans; font-size:20px; font-weight:bold;" class="w3-bar-item w3-button w3-right ">Register</a>';
    }
    ?>
  </div>


<!-- FORM -->

      <div class="w3-display-container">
      <img src = "images\iot2.jpg" width=57%>
          <div class="w3-display-position" style="top:250px; right:250px;">
           <form method="POST" action="insert.php">
             <br><br><br><br><br>
           <div class="log-reg-box">
             <h1 style="font-family:googlesans">Registration</h1>
           <div class="textbox">
             <input type="text" placeholder="First Name" name="fname" value="" required tabindex="1" alt="Name">
           </div>

           <div class="textbox">
             <input type="text" placeholder="Last Name" name="lname" value="" required tabindex="2" alt="Name">
           </div>

           <div class="textbox">
             <input type="text" placeholder="Address" name="address" value="" required tabindex="3">
           </div>

           <div class="textbox">
             <input type="text" placeholder="City" name="city" value="" required tabindex="4">
           </div>

           <div class="textbox">
             <input type="text" placeholder="PIN Code" name="pin" value="" required tabindex="5">
           </div>

           <div class="textbox">
             <input type="email" placeholder="E-mail" name="email" value="" required tabindex="6">
           </div>

           <div class="textbox">
             <input type="password" placeholder="Password" name="pwd" value="" required tabindex="7">
           </div>


           <input class="btn" type="Submit" name="Submit" value="Register" tabindex="9">
           <a class="signin" href="login.php"><-- Back to SignIn</a>

      </div>
      </form>
      </div>
      </div>
<!-- FORM_END -->

<!-- OVERLAY_SCRIPT -->
    <script>
    function openRightMenu() {
      document.getElementById("rightMenu").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }

    function closeRightMenu() {
      document.getElementById("rightMenu").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }
    </script>

      </body>
</html>
