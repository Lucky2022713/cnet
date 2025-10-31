<?php
$host = "localhost"; // usually this
$user = "root"; // default for XAMPP
$pass = ""; // default is empty
$dbname = "cnet_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
