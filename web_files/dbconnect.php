<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$mydb="anlab";

// Create connection
$con = new mysqli($servername, $username, $password,$mydb);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
//mysqli_select_db("epreuve",$conn)  or die("Could not connect to Database");
?>
