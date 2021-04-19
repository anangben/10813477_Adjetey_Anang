<?php
$hostname = "localhost";
$username="root";
$password ='';
$dbname="user_reg;

$connection= newmsqli ($hostname, $username,$password,$dbname);
if(mysqli_connect_error ()){
die("connection failed: "mysqli_connect_error());
} else{
echo "connection successful";
}




?>