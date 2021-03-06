<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>INDEX || IOT_SHOP</title>
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

        echo'<a href="admin.php" style="font-family:googlesans; font-size:18px; font-weight:bold; "class="w3-bar-item w3-button">UPDATE PRODUCTS</a>';
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





  <!-- <div class="w3-container"> -->
  <h2 style="font-family: Google Sans,sans-serif;padding-left: 15px">For Enthusiasts</h2>
  <?php
  $i=0;
  $product_id = array();
  $product_quantity = array();

  $result = $mysqli->query('SELECT * FROM products');
  if($result === FALSE){
    die(mysql_error());
  }

  if($result){

    while($obj = $result->fetch_object()) {


      echo '<div class="w3-col l4 w3-center" style="padding-left:20px; padding-bottom:10px">';
      echo '<div class="w3-card w3-hover-shadow" style="width:420px;">';
      echo '<header class="w3-container w3-light-grey">';
      echo '<h3>'.$obj->product_name.'</h3></p>';
      echo '</header>';
      echo '<div class="w3-container">';
      echo '<img alt='.$obj->product_name.' src="images/products/'.$obj->product_img_name.'"/>';
      echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
      echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
      echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';
      echo '</div>';




      if($obj->qty > 0){
        echo '<p><a style="text-decoration:none;" href="update-cart.php?action=add&id='.$obj->id.'"><button type="submit" name="" class="w3-button w3-block w3-dark-grey">ADD TO CART</button></a></p>';
      }
      else {
        echo 'Out Of Stock!';
      }

      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      $i++;
    }

  }

  $_SESSION['product_id'] = $product_id;
  ?>


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
