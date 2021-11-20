<?php



if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}

if($_SESSION["type"]==="admin") {
  header("location:admin.php");
}

include 'config.php';

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>MY ACCOUNT || IOT_SHOP</title>
  <title>Internet Of Things</title>
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="font.css">
</head>
<body>
  <header class="w3-container w3-teal w3-padding-16">
    <a href="index.php" style="text-decoration:none;"><h1 style="font-family:googlesans">INTERNET OF THINGS</h1></a>
  </header>

  <!-- Sidebar -->
  <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0;z-index:4;" id="rightMenu">
    <button onclick="closeRightMenu()" style="font-family:googlesans; font-size:18px; font-weight:bold;" class="w3-bar-item w3-button w3-large">Close &times;</button>
    <a href="index.php" style="font-family:googlesans; font-size:18px; font-weight:bold; "class="w3-bar-item w3-button">HOME</a>


    <?php
    if($_SESSION["type"]!="admin")
    {
      echo'<a href="products.php" style="font-family:googlesans; font-size:18px; font-weight:bold; "class="w3-bar-item w3-button">PRODUCTS</a>';
      echo'<a href="account.php" style="font-family:googlesans; font-size:18px; font-weight:bold; "class="w3-bar-item w3-button">MY ACCOUNT</a>';
      echo'<a href="orders.php" style="font-family:googlesans; font-size:18px; font-weight:bold; "class="w3-bar-item w3-button">MY ORDERS</a>';
      echo'<a href="cart.php" style="font-family:googlesans; font-size:18px; font-weight:bold; "class="w3-bar-item w3-button">VIEW CART</a>';
    }
    else if($_SESSION["type"]==="admin")
    {
      echo'<a href="admin-update.php" style="font-family:googlesans; font-size:18px; font-weight:bold; "class="w3-bar-item w3-button">UPDATE PRODUCT</a>';
      echo'<a href="admin-update.php" style="font-family:googlesans; font-size:18px; font-weight:bold; "class="w3-bar-item w3-button">MY ACCOUNT</a>';
    }

    ?>

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






  <div class="w3-container">

    <p><?php echo '<h3 style="font-family: googlesans,sans-serif";>Hi ' .$_SESSION['fname'] .'</h3>'; ?></p>

    <div class="w3-content">
      <p><h4 style="font-family: googlesans,sans-serif;font-size:23px;";>Account Details</h4></p>

      <p style="font-family: googlesans,sans-serif; font-size:20px;">Below are your details in the database. If you wish to change anything, then just enter new data in text box and click on update.</p>




      <form method="POST" action="update.php" style="margin-top:30px;">


        <?php

        $result = $mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id']);

        if($result === FALSE){
          die(mysql_error());
        }

        if($result) {
          $obj = $result->fetch_object();


          echo '<label for="right-label"><b>First Name</b></label>';
          echo '<input class = "w3-input" style="width:30%" type="text"  id="right-label" placeholder="'. $obj->fname. '" name="fname">';

          echo '<br>';
          echo '<label for="right-label"><b>Last Name</b></label>';
          echo '<input class = "w3-input" style="width:30%" type="text" id="right-label" placeholder="'. $obj->lname. '" name="lname">';

          echo '<br>';
          echo '<label for="right-label" class="right inline"><b>Address</b></label>';
          echo '<input  class = "w3-input" style="width:30%" type="text" id="right-label" placeholder="'. $obj->address. '" name="address">';

          echo '<br>';
          echo '<label for="right-label" class="right inline"><b>City</b></label>';
          echo '<input  class = "w3-input" style="width:30%" type="text" id="right-label" placeholder="'. $obj->city. '" name="city">';

          echo '<br>';
          echo '<label for="right-label" class="right inline"><b>Pin Code</b></label>';
          echo '<input  class = "w3-input" style="width:30%" type="text" id="right-label" placeholder="'. $obj->pin. '" name="pin">';

          echo '<br>';
          echo '<label for="right-label" class="right inline"><b>Email</b></label>';
          echo '<input  class = "w3-input" style="width:30%" type="email" id="right-label" placeholder="'. $obj->email. '" name="email">';

        }
        echo '<br>';
        echo '<label for="right-label"><b>Password</b></label>';
        echo '<input  class = "w3-input" style="width:30%" type="password" placeholder="new_password" id="right-label" name="pwd">';
        echo '<br>';
        ?>

        <div class="row">
          <div class="small-4 columns">

          </div>
          <div class="small-8 columns">
            <input type="submit" class="w3-btn w3-round" id="right-label" value="Update" style="background: #0078A0;  color: #fff; font-family:googlesans; font-size: 1em; padding: 10px;">
            <input type="reset" class="w3-btn w3-round" id="right-label" value="Reset" style="background: #0078A0;  color: #fff; font-family:googlesans; font-size: 1em; padding: 10px;">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
</div>
<br>

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
