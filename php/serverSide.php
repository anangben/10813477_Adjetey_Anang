<?php
session_start();
//Connect to the database
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

$sql = new mysqli($hostname, $username, $password, $dbname);
if(mysqli_connect_error()) {
    echo "Could not connect to the daabase: ".$sql->error;
}
 
if(isset($_POST["first_name"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];

   if($pass1 == $pass2) {
       //check if user exist
       $user_check = "SELECT * FROM users WHERE email = '$email'";
       $check_result = $sql->query($user_check);
       if($check_result->num_rows > 0) {
           echo "This account exists already";
       } else {
            //register
            $reg = "INSERT INTO users(firstname, lastname, email, Password) VALUES('$first_name', '$last_name', '$email', '$pass1')";
            if($sql->query($reg)) {
                $_SESSION["email"] = $email;
                echo "registered";
            } else {
                echo "not registered";
            }
       }
   } else {
       echo "Passwords are different";
   }


}


?>