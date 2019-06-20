<!--
Sage Stainsby
390889
KIT202 Secure Web Programming
Assignment 1
-->
<!DOCTYPE html>
<body>
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="MainCSS.css">
    <style>
    </style>
</head>
<center>

    <?php
    include('session.php');

    ?>



    <div class="navbar">
        <a class = "Brand" href="home.php">Sage Stainsby PMA</a>
        <!--Image source from     <!--Image source from http://www.pngall.com/wp-content/uploads/2016/04/Potato-Free-Download-PNG.png-->
        <img src="https://maxcdn.icons8.com/Share/icon/Plants//potato1600.png" alt="potatoSymbol" height="3%" width="3%" align="left">
        <a class = "changeColour1" href="mission.html">Our Mission</a>
        <a class = "changeColour1" href="process.html">The Process</a>
        <a class = "changeColour1" href="donate.html">Donate</a>
        <a class = "changeColour" href="purchase.php">Purchase</a>
        <a class = "changeColour" href="login.php">
            <?php if($login_session == NULL)
        {
            echo("login");
        } ?></a>
        <a class = "changeColour" href="signupv2.php">Sign Up</a>
        <a class = "changeColour" href="logout.php">Logout <?php echo $login_session; ?></a>

    </div>
    <div class="pageHeader">
        </br>
        <h1>User Login</h1>
    </div>
    <h1>Welcome <?php echo $login_session; ?></h1>

    <div class="splitDisplay">
        <div class="right">
            <!--Image source http://www.landwise.org.nz/wp-content/uploads/2010/12/Wilcox-Photo1-Potatoes.jpg-->
            <img src="potatoIMG.jpg" alt="Potato" width="32%" height="32%" align ="right">
        </div>
        <div class="left">
            <img src="http://www.abc.net.au/radionational/image/5815342-4x3-700x525.jpg"  alt="Farm Photo" width="32%" height="32%" align="left">
        </div>
        <div class="middle">
            <img src="http://www.valentinesdayi.com/wp-content/uploads/2017/01/Valentines-Day-Gifts-9-1.jpg"  alt="Potato Photo" width="36%" height="36%" align = "middle">

        </div>
    </div>



<h2><a href = "logout.php">Sign Out</a></h2>

</center>
</body>
</html>