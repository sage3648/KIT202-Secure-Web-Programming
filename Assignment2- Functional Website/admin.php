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
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="MainCSS.css">
    <style>
    </style>
</head>
<body>

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
    <h1>Admin Area
    </h1>
</div>
<div class="purchase">
    <h1 align="center">

        Make changes to stock and user details

        <br>
    </h1>
    <center>
        <h2>

            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $number = $_POST ['number'];
                $description = $_POST ['description'];
                $quantity = $_POST ['quantity'];

                $ID = $_POST ['ID'];
                $Username = $_POST ['Username'];
                $Access = $_POST ['Access'];

                $sql2 = "INSERT INTO `Stock`(`number`, `description`, `quantity`) VALUES ('$number','$description','$quantity')"; //add new item to stock

                $mysqli->query($sql2);

                $sql2 = "UPDATE `Stock` SET `number`='$number',`description`='$description',`quantity`='$quantity' WHERE `number` = '$number'"; //update Stock data with new input

                $mysqli->query($sql2);

                $sql5 = "UPDATE `Customers` SET `ID`='$ID',`Username`='$Username',`Access`='$Access' WHERE `ID` = '$ID'"; //update Customers data with new data input

                $mysqli->query($sql5);


            }

            $sql = "SELECT * FROM `Stock` LIMIT 0, 30 ";
            $sql3 = "SELECT * FROM `Customers` LIMIT 0, 30 ";

            $result = $mysqli->query($sql);
            $result2 = $mysqli->query($sql3);

            if ($result->num_rows > 0) {

                echo "<center><table><tr><th>number</th><th>description</th><th>quantity</th></tr></center>";

                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo "<tr><td>" . $row["number"] . "</td><td>" . $row["description"] . "</td><td>" . $row["quantity"] . "</td>";
                }
                echo "</table>";
            }
            ?>

            <p1>

                <br>
                (Add new item by typing new number, description, ect <br>
                and edit an item by entering an existing number <br> and then a new description and quantity)
                <br>

                <div class="formT">

                    <form class="formT" action="" method="post">


                        <label>Number :</label><input type="text" name="number" id="number" class="box"/><br/><br/>
                        <label>Description :</label><input type="text" name="description" id="description" class="box"/><br/><br/>
                        <label>Quantity :</label><input type="text" name="quantity" id="quantity"
                                                        class="box"/><br/><br/>

                        <input type="submit" value=" Submit "/><br/>
                        <a class="reset" href="admin.php">reset</a>

                    </form>

                </div>

            </p1>

            <div>

                <?php

                if ($result2->num_rows > 0) {

                    echo "<center><table><tr><th>ID</th><th>Username</th><th>Password</th><th>Access</th></tr></center>";

                    while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Username"] . "</td><td>" . $row["Password"] . "</td><td>" . $row["Access"] . "</td>";
                    }
                    echo "</table>";
                }

                ?>
                <div class="formT">

                    <h6> Update user details and Access

                        <br><br> (Enter existing ID and then edit Username and Access by editing Username and Access forms)</h6>

                    <form class="formT" action="" method="post">


                        <label>ID :</label><input type="text" name="ID" id="ID" class="box"/><br/><br/>
                        <label>Username :</label><input type="text" name="Username" id="Username"
                                                        class="box"/><br/><br/>
                        <label>Access :</label><input type="text" name="Access" id="Access" class="box"/><br/><br/>

                        <input type="submit" value=" Submit "/><br/>
                        <a class="reset" href="admin.php">reset</a>

                    </form>

                </div>

            </div>


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

