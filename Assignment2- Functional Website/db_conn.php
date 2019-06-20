<?php
//connect to mysql
$mysqli = new mysqli('localhost', 'sages', '390889', 'sages');

if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
?>