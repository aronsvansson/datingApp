<?php
    include("mysql.php");
//    include("Userclass.php");
    session_start();

    loginUser();

    function loginUser(){
        include("mysql.php");

        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];

        $userQueryString = "SELECT * FROM userPass WHERE username='$username'";
        $result = $mySQL->query($userQueryString);
        $row = $result->fetch(assoc)();

        if (password_verify($password,$row["password"])) 
        {
          echo "din login"; 
        } else 
          {
          echo "nej login";
        
        };
    
    }






    // header('location: register.php');

?>