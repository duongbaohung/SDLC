<?php

$servername = "sql100.infinityfree.com";
$username = "if0_40505803";
$password = "fcXu5H4NL9";
$dbname = "if0_40505803_user_roles_app";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("Connection failed:". $conn->connect_error);
}



/*
// 1. Database Connection Parameters
$db_server = "localhost"; // Usually 'localhost' if the database is on the same machine
$db_username = "root";    // Your database username
$db_password = "";        // Your database password (often blank for local development)
$db_name = "user_roles_app"; // 💡 REPLACE with the actual name of your database

// 2. Establish the Connection
$connect = mysqli_connect($db_server, $db_username, $db_password, $db_name);

// 3. Check for Connection Errors
if (mysqli_connect_errno()) {
    // If there is an error, print the error message and terminate the script
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // Use die() or exit() to stop execution if the connection fails
    exit(); 
}

// Optional: Set character set to UTF-8
mysqli_set_charset($connect, "utf8");

// The variable $connect is now available in your main product page to run queries
*/
?>