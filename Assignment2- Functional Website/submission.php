<?php

$mysqli = new mysqli("localhost", "sages","390889", "sages");


if (mysqli_connect_errno())
{
    printf("Connect failed: %s\n", mysqli_connect_error()); exit();
}else{
    printf("submitted hopefully");
}



$username = $_POST ["username"];
$password = $_POST ["password"];
$email = $_POST ["email"];




$sql = "INSERT INTO `aUsers`(username`, `password`, `email`) VALUES ('$username','$password','$email')";

$mysqli->query($sql);
$mysqli->close();

