<?php
    include("mysql.php");
//    include("Userclass.php");
    session_start();

    if (isset($_POST["submit"])) {

        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];
        echo $password;

        if(empty($username) || empty($password)){
            header('location: login.php?error=emptyField');
            exit();
        }


        $sql_user = "SELECT * FROM userPass WHERE username='$username'";
        $result = $mySQL->query($sql_user);
        $row = $result->fetch_assoc();
        echo $row["password"];


        $hashedPassword = $row["password"];
        $checkPassword = password_verify($password, $hashedPassword);

        if ($checkPassword === false){
            header('location: login.php?error=wrongLogin');
            exit();
        } else if ($checkPassword === true) {
            header('location: welcome.php');
            echo "welcome";
        } 

    }








    // header('location: register.php');

?>