<!--
Sage Stainsby
390889
KIT202 Secure Web Programming
Assignment 2
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="MainCSS.css">
    <style>
    </style>
</head>
<body>
<?php
include('session.php'); //session for session data
include('db_conn.php'); //database connection to alacritas

if ($_SERVER["REQUEST_METHOD"] == "POST") { //if submit has be pressed
    $message = $_POST['message'];

    $sql = "INSERT INTO `Trolley`( `cust_id`, `paid`, `customerNote`) VALUES ('$login_session', 'n', '$message')"; //insert item and custom message into database

    $mysqli->query($sql); //execute query

}
?>
-- Main navigation bar, used across multiple pages
<div class="navbar">
    <a class="Brand" href="home.php">Sage Stainsby PMA</a>
    <!--Image source from     <!--Image source from http://www.pngall.com/wp-content/uploads/2016/04/Potato-Free-Download-PNG.png-->
    <img src="https://maxcdn.icons8.com/Share/icon/Plants//potato1600.png" alt="potatoSymbol" height="3%" width="3%"
         align="left">
    <a class="changeColour" href="purchase.php">
        Purchase <?php

        $sql = "SELECT * FROM `Trolley` WHERE `cust_id` = '$login_session'"; //grab items in customer trolley

        $result = $mysqli->query($sql); //store results

        echo("(");
        echo($result->num_rows); //create badge next to purchase page nav with number of items in users trolley(linked to userID)
        echo(")");
        ?>

    </a>

    <?php
    $sql = "SELECT * FROM `Customers` WHERE `Username` = '$login_session' AND `Access` = '1'"; //grabbing all admin users with name saved in user session
    $results = $mysqli->query($sql);

    if ($results->num_rows > 0 == 1) { //if the user is an admin create admin area link
        echo("<a class = \"changeColour\" href = \"admin.php\"> ADMIN AREA </a>");
    }

    ?>

    <?php if ($login_session == NULL) { //if user is not logged in
        echo(" <a class = \"changeColour\" href=\"login.php\"> Login  </a>");
    } ?>


    <?php if ($login_session == NULL) {
        echo("<a class = \"changeColour\" href=\"signupv2.php\"> Sign Up </a>");
    } ?>


    <?php if ($login_session != NULL) { //if user is logged in, give option to logout
        echo("<a class = \"changeColour\" href=\"logout.php\"> Logout $login_session </a> ");
    } ?>

</div>
<div class="pageHeader">
    </br>
    <h1>Potato Messages Australia </h1>
    <!--Image source from http://www.pngall.com/wp-content/uploads/2016/04/Potato-Free-Download-PNG.png-->

    <p2> Send a Friend a Potato with a Personalised Message </br>and Support Australian Farms</p2>
    </br><img src="Potato-Free-Download-PNG.png" alt="PotatoPNG" width=15% height=15% align="middle">
</div>
<div class="formT">

    <form class="formT" action="" method="post">

        <textarea input="text" id="message" name="message" id="message"> Enter Your Message </textarea>

        <button type="submit">
            <a href="#" class="changeColour3"> <strong>Add to Cart <br> (Sign in required) </strong></a>
        </button>
        <br/>

    </form>

</div>

<div class="threeStep">
    <!--Graphic made up of three icons,
    icon 1 src: https://d30y9cdsu7xlg0.cloudfront.net/png/14215-200.png
    icon 2 src: http://www.freeiconspng.com/ptp.php?shopping-cart-icon-30
    icon 3 src: http://www.iconsdb.com/icons/download/black/airplane-57-512.gif-->
    <img src="3steps.png" alt="3 steps" width="40%" height="40%" align="middle">
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