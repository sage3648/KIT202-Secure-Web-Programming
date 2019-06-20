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
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="MainCSS.css">
    <style>
    </style>
</head>
<body>
<?php

include('db_conn.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") { //when submit is pressed


    $myusername = $_POST ['username']; //store data from user formed in PHP variables
    $mypassword = $_POST ['password'];

    $mypassword = md5($mypassword); //encrypt input so it matches saved input


    $sql = "SELECT ID FROM Customers WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    if ($count >= 1) { //if number of users with matching credentials is then 1(1 in maximum)
        session_register("myusername");
        $_SESSION['login_user'] = $myusername;

        header("location: home.php");

    } else {
        printf("Invalid username/password");
    }
}
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
    <h1>User Login</h1>
</div>
<div class="loginInputs">
    <form action="" method="post">
        <form action="" method="post">
            <label>UserName:</label><input type="text" name="username" class="box"/><br/><br/>
            <label>Password:</label><input type="password" name="password" class="box"/><br/><br/>
            <input type="submit" value=" Submit "/><br/>
            <a class="sign-up" href="signupv2.php">sign-up</a> <br>
            <a class="reset" href="login.php">reset</a>
        </form>
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