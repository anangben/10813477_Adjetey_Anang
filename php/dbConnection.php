<?php
//Connect to the database
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

$sql = new mysqli($hostname, $username, $password, $dbname);
if(mysqli_connect_error()) {
    echo "Could not connect to the daabase: ".$sql->error;
} 