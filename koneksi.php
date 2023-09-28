<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_karyawan";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
