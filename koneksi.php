<?php
$hostname="localhost";
$username="root";
$database="madingonline";

$connection = mysqli_connect($hostname, $username, '', $database);

if (!$connection) {
    die("Failed to connect db" . mysqli_connect_error());
};
?>  