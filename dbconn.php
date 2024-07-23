<?php
/* php & mysql db connection file */
$usernameDB = "root"; //mysql username
$passwordDB = ""; //mysql password
$servername = "localhost"; //server name or ip address
$dbname = "kiddosmart"; //your db name

// Establishing connection using mysqli
 $dbconn = mysqli_connect($servername, $usernameDB, $passwordDB, $dbname);

// Checking connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // You might want to add an exit statement here if you don't want the script to continue after a connection failure
    exit();
}