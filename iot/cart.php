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




    <div class="w3-container">


        <?php

          echo '<p><h3 style="font-family:googlesans">Your Shopping Cart</h3></p>';

          if(isset($_SESSION['cart'])) {

            $total = 0;
            echo '<div class="w3-container"style="max-width:900px">';
            echo '<table class="w3-table-all w3-card-4">';
            echo '<tr class="w3-blue">';
            echo '<th>Code</th>';
            echo '<th>Name</th>';
            echo '<th>Quantity</th>';
            echo '<th>Cost</th>';
            echo '</tr>';
            foreach($_SESSION['cart'] as $product_id => $quantity) {

            $result = $mysqli->query("SELECT product_code, product_name, product_desc, qty, price FROM products WHERE id = ".$product_id);


            if($result){

              while($obj = $result->fetch_object()) {
                $cost = $obj->price * $quantity; //work out the line cost
                $total = $total + $cost; //add to the total cost

                echo '<tr>';
                echo '<td style="font-family:googlesans">'.$obj->product_code.'</td>';
                echo '<td style="font-family:googlesans">'.$obj->product_name.'</td>';
                echo '<td style="font-family:googlesans; font-size:13px;">'.$quantity.'&nbsp;&nbsp;&nbsp;<a class="w3-button w3-green w3-circle" style="padding:3px 8px 3px 8px;" href="update-cart.php?action=add&id='.$product_id.'">+</a>&nbsp;&nbsp;<a class="w3-button w3-red w3-circle" style="padding:3px 8px 3px 8px;" href="update-cart.php?action=remove&id='.$product_id.'">-</a></td>';
                echo '<td style="font-family:googlesans">₹ '.$cost.'</td>';
                echo '</tr>';
              }
            }

          }



          echo '<tr>';
          echo '<td colspan="3" align="right" style="font-family:googlesans;">Total</td>';
          echo '<td style="font-family:googlesans">₹ '.$total.'</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<td colspan="4" align="right" style="font-family:googlesans"><a href="update-cart.php?action=empty" class="w3-button w3-blue w3-round-large">Empty Cart</a>&nbsp;<a href="products.php" class="w3-button w3-blue w3-round-large">Continue Shopping</a>';
          if(isset($_SESSION['username'])) {
            echo '<a href="orders-update.php"><button class="w3-button w3-blue w3-round-large " style="float:right;">COD</button></a>';
          }

          else {
            echo '<a href="login.php"><button style="float:right;">Login</button></a>';
          }

          echo '</td>';

          echo '</tr>';
          echo '</table>';
        }

        else {
          echo '<p style="font-family:googlesans; font-size:20px;">You have no items in your shopping cart !!!</p>';
        }





        echo '</div>'
          ?>

</div>






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
