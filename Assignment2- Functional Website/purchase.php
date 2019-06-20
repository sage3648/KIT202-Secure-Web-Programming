<!--
Sage Stainsby
390889
KIT202 Secure Web Programming
Assignment 2
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>purchase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="MainCSS.css">
    <style>
    </style>
</head>
<body>
<script>

    function validate2() {
        var name = document.getElementById("deliveryName").value;
        var address = document.getElementById("deliveryAddress").value;
        var pc = document.getElementById("deliveryPostcode").value;

        if (name == '' || address == '' || pc == '') { //check that all forms have data
            alert("all forms must be filled out to precede in purchase! ")
        }
    }
</script>

<?php
include('session.php');
include('db_conn.php');
?>
<div class="navbar">
    <a class="Brand" href="home.php">Sage Stainsby PMA</a>
    <!--Image source from     <!--Image source from http://www.pngall.com/wp-content/uploads/2016/04/Potato-Free-Download-PNG.png-->
    <img src="https://maxcdn.icons8.com/Share/icon/Plants//potato1600.png" alt="potatoSymbol" height="3%" width="3%"
         align="left">
    <a class="changeColour" href="purchase.php">
        Purchase <?php $sql = "SELECT * FROM `Trolley` WHERE `cust_id` = '$login_session'";

        $result = $mysqli->query($sql);

        echo("(");
        echo($result->num_rows);
        echo(")");
        ?>

    </a>

    <?php
    $sql = "SELECT * FROM `Customers` WHERE `Username` = '$login_session' AND `Access` = '1'";
    $results = $mysqli->query($sql);

    if ($results->num_rows > 0 == 1) {
        echo("<a class = \"changeColour\" href = \"admin.php\"> ADMIN AREA </a>");
    }

    ?>

    <?php if ($login_session == NULL) {
        echo(" <a class = \"changeColour\" href=\"login.php\"> Login  </a>");
    } ?>


    <?php if ($login_session == NULL) {
        echo("<a class = \"changeColour\" href=\"signupv2.php\"> Sign Up </a>");
    } ?>


    <?php if ($login_session != NULL) {
        echo("<a class = \"changeColour\" href=\"logout.php\"> Logout $login_session </a> ");
    } ?>

</div>
<div class="pageHeader">
    </br>
    <h1>Checkout
    </h1>
</div>
<div class="purchase">
    <h1 align="center">

        <?php echo($login_session) ?>
        's items
        <br>
    </h1>
    <center><h2>
            <?php


            $sql = "SELECT * FROM `Trolley` WHERE `cust_id` = '$login_session'";

            $result = $mysqli->query($sql);

            echo($result->num_rows);

            $numberItems = ($result->num_rows);
            $totalPrice = $numberItems * 10; //calculate total cost 10*number of items the user has
            ?>


            Personal Potato Message(s)
        </h2>
    </center>
    <?php


    if ($result->num_rows > 0) {

        echo "<center><table><tr><th>cust_id</th><th>paid</th><th>customerNote</th></tr></center>";

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            echo "<tr><td>" . $row["cust_id"] . "</td><td>" . $row["paid"] . "</td><td>" . $row["customerNote"] . "</td>";
        }
        echo "</table>";
    }
    ?>
    <h2 align="center"> Total Price : <?php echo($totalPrice) ?>$(AUD)</h2>
</div>
<div class="purchaseInputs">
    <p1><strong>Recepient Name:</strong></br> <input type="text" id="deliveryName" onchange="validate2()"></br> </p1>
    <p2><strong>Address Line 1:</strong></br> <input type="text" id="deliveryAddress" onchange="validate2()"> </br></p2>
    <p3><strong>Address Line 2:</strong> </br><input type="text" id="deliveyAdress2" onchange="validate2()"> </br></p3>
    <p4><strong>PostCode:</strong> </br><input type="text" id="deliveryPostcode" onchange="validate2()"> </br></p4>

    <form action=home.php>
        <button href=home.php>Complete Order</button>
    </form>
</div>
<footer>
    <p>Sage Stainsby</p>
    <p>390889</p>
    <p>Assignment 2</p>
</footer>
<div class="splitDisplay">
    <div class="right">
        <!--Image source http://www.landwise.org.nz/wp-content/uploads/2010/12/Wilcox-Photo1-Potatoes.jpg-->
        <img src="potatoIMG.jpg" alt="Potato" width="32%" height="32%" align="right">
    </div>
    <div class="left">
        <!--Image source http://www.abc.net.au/radionational/image/5815342-4x3-700x525.jpg-->
        <img src="farmPhoto.jpg" alt="Farm Photo" width="32%" height="32%" align="left">
    </div>
    <div class="middle">
        <!--Image source http://www.houstonsfarm.com.au/wp-content/uploads/2013/02/IW29967_2mb.jpg-->
        <img src="potato2.jpg" alt="Potato Photo" width="36%" height="36%" align="middle">

    </div>


</div>
</body>
</html>