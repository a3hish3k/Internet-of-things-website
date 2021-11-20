<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}
include 'config.php';
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }


    </style>
</head>

<body>
  <?php
    $user = $_SESSION["username"];
    $result = $mysqli->query("SELECT * from orders where email='".$user."'");
    if($result) {
      while($obj = $result->fetch_object()) {

    echo '<div class="invoice-box">';
        echo '<table cellpadding="0" cellspacing="0">';
            echo '<tr class="top">';
                echo '<td colspan="2">';
                    echo '<table>';
                        echo '<tr>';
                            echo '<td class="title">';
                                echo '<img src="iot_shop.png">';
                            echo '</td>';

                            echo '<td>';
                                echo 'Invoice #: 123<br>';
                                echo 'Created: January 1, 2015<br>';
                                echo 'Due: February 1, 2015';
                            echo '</td>';
                        echo '</tr>';
                    echo '</table>';
                echo '</td>';
            echo '</tr>';

            echo '<tr class="information">';
                echo '<td colspan="2">';
                    echo '<table>';
                        echo '<tr>';
                            echo '<td>';
                                echo 'Sparksuite, Inc.<br>';
                                echo '12345 Sunny Road<br>';
                                echo 'Sunnyville, CA 12345';
                            echo '</td>';

                            echo '<td>';
                                echo 'Acme Corp.<br>';
                                echo 'John Doe<br>';
                                echo 'john@example.com';
                            echo '</td>';
                        echo '</tr>';
                    echo '</table>';
                echo '</td>';
            echo '</tr>';

            echo '<tr class="heading">';
                echo '<td>';
                    echo 'Payment Method';
                echo '</td>';

                echo '<td>';
                    echo 'Check #';
                echo '</td>';
            echo '</tr>';

            echo '<tr class="details">';
                echo '<td>';
                    echo 'Check';
                echo '</td>';

                echo '<td>';
                    echo '1000';
                echo '</td>';
            echo '</tr>';

            echo '<tr class="heading">';
                echo '<td>';
                    echo 'Item';
                echo '</td>';

                echo '<td>';
                    echo 'Price';
                echo '</td>';
            echo '</tr>';

            echo '<tr class="item">';
                echo '<td>';
                    echo 'Website design';
                echo '</td>';

                echo '<td>';
                    echo '$300.00';
                echo '</td>';
            echo '</tr>';
            echo '<tr class="total">';
                echo '<td></td>';

                echo '<td>';
                   echo 'Total: $385.00';
                echo '</td>';
            echo '</tr>';
        echo '</table>';
    echo '</div>';
?>
</body>
</html>
