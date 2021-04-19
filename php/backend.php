<?php
session_start();
require_once "dbConnection.php";

//Sign In
if(isset($_POST["first_name"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password1 = $_POST["pass1"];
    $password2 = $_POST["pass2"];

    if($first_name != null && $last_name != null && $email != null && $password1 != null && $password2 != null) {

    //Check if passwords are equal
    if($password1 != $password2) {
        echo "Passwords does not match";
    } else {
        //Check if email is not registered
        $password = md5($password1);
        $check_email = "SELECT * FROM user_reg WHERE email = '$email'";
        $email_result = $sql->query($check_email);
        if($email_result->num_rows > 0) {
            echo "Email is aleady registered";
        } else {
        //register user 
        $register = "INSERT INTO user_reg(firstname, lastname, email, password) VALUES('$first_name', '$last_name', '$email', '$password')";
        if($sql->query($register)) {
            echo "true";
            $_SESSION["email"] = $email;
        } else {
            echo "user not registered";
        }
        }
        
    }
    } else {
        echo "You have empty fields";
    }

}


//Sign In
if(isset($_POST["email2"]) && isset($_POST["pass3"])) {
    $email = $_POST["email2"];
    $password = md5($_POST["pass3"]);

    $login = "SELECT * FROM user_reg WHERE email ='$email' && Password = '$password'";
    $login_result = $sql->query($login);
    if($login_result->num_rows > 0) {
        $_SESSION["email"] = $email;
        $_SESSION["logged_in"] = "true";
        echo "true";
    } else {
        echo "Email or password is not correct";
    }


}



?>