<?php
// Database credentials
$servername = "127.0.0.1:3306";
$username = "root"; 
$password = "";     
$dbname = "diosana"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
