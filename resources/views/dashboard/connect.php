<?php
$servername = "localhost";
// Enter your MySQL username below(default=root)
$username = "helsewkz_admin";
// Enter your MySQL password below
$password = "Virtue@1998";
$dbname = "helsewkz_bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    header("location:connection_error.php?error=$conn->connect_error");
    die($conn->connect_error);
}
?>
