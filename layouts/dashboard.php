<?php
session_start();
require_once "../php/dbConnection.php";

if(!isset($_SESSION["email"])) {
    header("location: index.html");
} else {
    $email = $_SESSION["email"];

    $userfname = "SELECT * FROM user_reg WHERE email = '$email'";
    $fname_result = $sql->query($userfname);
    if($fname_result->num_rows > 0) {
        while($user = $fname_result->fetch_assoc()) {
            $fname = $user["firstname"];
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <div class="page">
        <div class="dashboard">
            <div>
            <p>Hello, <?php echo $fname ?></p>
            <p>E-mail: <?php echo $email ?>
            <p>You have succesfully signed up</p>
            <a href="../php/logOut.php">Log Out</a>
        </div>
        </div>
    </div>
</body>
</html>