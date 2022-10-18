<?php
    include("mysql.php");
//    include("Userclass.php");

    $firstname = $_REQUEST["firstname"];
    $lastname = $_REQUEST["lastname"];
    $height = $_REQUEST["height"];
    $age = $_REQUEST["age"];
    $gender = $_REQUEST["gender"];
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];


    $newUserInfo = "INSERT INTO userInfo (firstname, lastname, height, age, gender)
    VALUES ('$firstname','$lastname','$height','$age','$gender')";
    $mySQLfind = $mySQL->query($newUserInfo);

 
    $findUser = "SELECT id FROM userInfo ORDER BY id DESC LIMIT 1";
    $response = $mySQL->query($findUser);
    $data = $response->fetch_object();
    
    $passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $signupPass = "INSERT INTO userPass (id, username, password) 
    VALUES ('$data->id','$username', '$passwordHash')";
    $response = $mySQL->query($signupPass);
  


    header('location: register.php');

?>