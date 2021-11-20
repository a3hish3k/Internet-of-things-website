<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

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

  <!-- page content -->
  <div class="w3-container w3-dark-grey w3-padding">
    <div class="w3-content ">
      <h2 style="font-family: googlesans,sans-serif">What is IOT ?</h2><hr>
      <p style="font-family:Open Sans; font-size: 18px;">The internet of things, or IoT, is a system of interrelated computing devices, mechanical and digital machines, objects, animals or people that are provided with unique identifiers (UIDs) and the ability to transfer data over a network without requiring human-to-human or human-to-computer interaction.
      </p>

      <p style="font-family:Open Sans; font-size: 18px;">A thing in the internet of things can be a person with a heart monitor implant, a farm animal with a biochip transponder, an automobile that has built-in sensors to alert the driver when tire pressure is low or any other natural or man-made object that can be assigned an IP address and is able to transfer data over a network.
      </p>

      <p style="font-family:Open Sans; font-size: 18px;">Increasingly, organizations in a variety of industries are using IoT to operate more efficiently, better understand customers to deliver enhanced customer service, improve decision-making and increase the value of the business.
      </p>
    </div>
  </div>

  <div class="w3-container w3-light-grey w3-padding">
    <div class="w3-content ">
      <h2 style="font-family: googlesans,sans-serif">How IOT Works</h2><hr style="border-color:black;">
      <p style="font-family:montserrat; font-size: 18px;">
        An IoT ecosystem consists of web-enabled smart devices that use embedded processors, sensors and communication hardware to collect, send and act on data they acquire from their environments. IoT devices share the sensor data they collect by connecting to an IoT gateway or other edge device where data is either sent to the cloud to be analyzed or analyzed locally. Sometimes, these devices communicate with other related devices and act on the information they get from one another. The devices do most of the work without human intervention, although people can interact with the devices -- for instance, to set them up, give them instructions or access the data.
      </p>

      <p style="font-family:montserrat; font-size: 18px;">
        The connectivity, networking and communication protocols used with these web-enabled devices largely depend on the specific IoT applications deployed.
      </p>
    </div>
  </div>

  <div class="w3-container w3-dark-grey w3-padding-32">

    <img style="display:block; margin-left:auto; margin-right:auto; width:50%;"src="images\iota-iot_system.png" alt="examples of iot system">
  </div>

  <div class="w3-container w3-light-grey w3-padding">
    <div class="w3-content ">
      <h2 style="font-family: googlesans,sans-serif">Benefits of IoT</h2><hr style="border-color:black;">
      <p style="font-family:Open Sans; font-size: 18px;">The internet of things offers a number of benefits to organizations, enabling them to:
      </p>
      <ul style="font-family:Open Sans;font-size: 18px;">
        <li>monitor their overall business processes;</li>
        <li>improve the customer experience;</li>
        <li>save time and money;</li>
        <li>enhance employee productivity;</li>
        <li>integrate and adapt business models;</li>
        <li>make better business decisions; and</li>
        <li>generate more revenue.</li>
      </ul>
      <p style="font-family:Open Sans; font-size: 18px;">IoT encourages companies to rethink the ways they approach their businesses, industries and markets and gives them the tools to improve their business strategies.
      </p>
    </div>
  </div>

  <!-- <div class="w3-container">

  <p style="text-align:center;"> <a href="#"> <button class="w3-button w3-grey w3-round-large"><b>KNOW MORE</b></button></a></p>
</div> -->

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
