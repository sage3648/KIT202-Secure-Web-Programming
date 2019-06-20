<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="MainCSS.css">

</head>
<body>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type=text/javascript>

    function setup_country_change() { //self study 9
        //check whether country section is changed.
        $('#country').change(update_cities);
    }

    function update_cities() {
        //assigns the selected country to country variable.
        var country = $('#country').val();

        //get_cities.php performs when the country is selected.
        //call the function(show_cities) when the data is returned from get_cities.php.
        $.get('get_cities.php?country=' + country, show_cities);
    }

    function show_cities(cities) {
        //returned data from get_cities.php is assigned to cities
        //change the field(drop down list)
        $('#cities').html(cities);
    }

    //When the page is loaded, function (setup_country_change())is called.
    $(document).ready(setup_country_change);


    function test() {
        var email = document.getElementById("email").value;

        if (username.matches(".*\\d+.*")) {
            alert("must contain at least one number");

        }
    }


    function validate() {

        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var rpassword = document.getElementById("rpassword").value;


        if (password.length < 5) {
            alert("password a minimum of 5 characters");
        }
        if (password.contains(' ')) {
            alert("password cannot contain spaces");
        }
        if (password != rpassword) {
            alert("both password must match");
        }
    }

</script>

<?php
include('db_conn.php');

$username = $_GET['username'];

if ($username == "test") {
    echo "testing this";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { //when submit is pressed

    $myusername = $_POST ['username']; //grab all user data from forms
    $mypassword = $_POST ['password'];
    $rmypassword = $_POST ['rPassword'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $DOB = $_POST['DOB'];

    $mypassword = md5($mypassword); //encypt user data
    $rmypassword = md5($rmypassword);

    $sql3 = "SELECT * FROM Customers WHERE username = '$myusername'";
    $result = $mysqli->query($sql3);

    if ($rmypassword == $mypassword) {
        // $sql = "INSERT INTO `Users`(`ID``username`, `password`, `access`) VALUES ([NULL],[$myusername],[$mypassword],['1'])";
        $sql2 = "INSERT INTO `Customers`( `username`, `password`, `Name`,`Email`,`DOB`,`access`) VALUES ('$myusername','$mypassword', '$fName $lName','$email','$DOB','2')";
        //$mysqli->query($sql);
        $mysqli->query($sql2);
        printf("Account creation succesful, thank you for signing up!");
        header("location:home.php");
    } else if ($result->num_rows > 0 == 1) {
        printf("That username already exists, try again");
    } else {
        printf("Your password do not match, try again");
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
    <h1>Sign Up</h1>
    <p1>Save your Delivery Preferences for a Faster Checkout</p1>
</div>

<center>
    <form class="loginInputs" action="" method="post">


        <form action="#" method="post" id="inputData" name="inputData">
            <label>* Choose a username :</label><input type="text" name="username" id="username" class="box"
                                                       onchange="validate()"/><br/><br/>
            <label>* Choose a password :</label><input type="password" name="password" id="password" class="box"
                                                       onchange="validate()"/><br/><br/>
            <label>* Retype password :</label><input type="password" name="rPassword" id="rpassword" class="box"
                                                     onchange="validate()"/><br/><br/>
            <label>* First Name :</label><input type="text" name="fName" class="box"/><br/><br/>
            <label>* Last Name :</label><input type="text" name="lName" class="box"/><br/><br/>
            <label>Enter your email :</label><input type="text" name="email" id="email " class="box" onchange="" = "
            validate()"/><br/><br/>
            <label>* DOB</label> <input type=text name=DOB id=DOB class="box"/> <br>
            <input type="radio" name="gender" value="male"> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="radio" name="gender" value="other"> Other <br>


            <input type="submit" value=" Submit "/><br/>
            <a class="reset" href="signupv2.php">reset</a>
        </form>


    </form>

    <!--from self study 9, includes get_city.php -->
    <form id="select_country" name="select_country" method="" action="#">
        <table>
            <tr>
                <th>Select your country :</th>
                <td>
                    <select name="country" id="country">
                        <option value="" selected="selected">Please Select Country</option>
                        <option value="au">Australia</option>
                        <option value="cn">China</option>
                        <option value="uk">United Kingdom</option>
                        <option value="us">United States</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Cities:</th>
                <td id="cities">Please Select Country First</td>
            </tr>
        </table>
    </form>

</center>
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