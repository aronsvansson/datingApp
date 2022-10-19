<?php
    include("mysql.php");
//    include("Userclass.php");
    session_start();

    loginUser();

    function loginUser(){
        include("mysql.php");

        $username = isset($_POST["username"]) ? $_POST["username"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        // get user object form database using login username
        $userQueryString = "SELECT * FROM userPass WHERE username='$username'";
        $result = $mySQL->query($userQueryString);
        $row = $result->fetch_assoc();

        // verify password with hash
        if (password_verify($password,$row["password"])){
          // generate token
          $token = random_bytes(24);
          // save token in database
          $userId = $row["id"];
          $insert_token_string = "INSERT INTO userSession (user_id, token) VALUES ('$userId', '$token')";
          $mySQL->query($insert_token_string);
          // save token in session
          $_SESSION["token"] = $token;

          // redirect to home page
          header('location: profile.php');
          
      } else {
          header('location: register_login_page.php');
      } 
 
    
    }






    // header('location: register.php');

?>