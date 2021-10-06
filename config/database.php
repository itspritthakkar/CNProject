<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abs";

// Create connection
$conn = new PDO("mysql:host=" .$servername. "; dbname=" . $dbname, $username, $password);
