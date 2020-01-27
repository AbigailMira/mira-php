<?php
/* 
 * connection to database, using PDO to be able to experiment beyond MySQL
 * using w3schools example from "PHP connect to MySQL page"
 */
$servername = "localhost";
$username = "root";
$password = "";
$db = "mymakeupdb";

$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
    
?>
