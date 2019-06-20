<?php

include('db_conn.php');
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($mysqli,"select username from Customers where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['username'];

//session learned/source from TutorialPoint (https://www.tutorialspoint.com/php/php_sessions.htm)