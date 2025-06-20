<?php
$host = "localhost";
$user = "root";
$pass = "Himesh@12345"; // your MySQL password
$dbname = "task_db";    // database name you created

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
