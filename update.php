<?php
    include("mysql.php");
    session_start();
    if(!isset($_SESSION['id'])) {
    header('location: login.php?error=wrongLogin');
    exit;
}

    if(isset($_POST['update'])) { 
        $id = $_SESSION['id'];

        $firstname = $_REQUEST["firstname"];
        $lastname = $_REQUEST["lastname"];
        $height = $_REQUEST["height"];
        $age = $_REQUEST["age"];


        if(empty($firstname) || empty($lastname) || empty($height) || empty($age)){
            header('location: welcome.php?status=fail_empty');
            exit();
        }
        if($age <= 0) {
            header('location: welcome.php?status=age_fail');
            exit();
        }

        $sql = "UPDATE userInfo SET firstname='$firstname', lastname='$lastname', height='$height', age='$age' WHERE id='$id'";
        $query_update = mysqli_query($mySQL, $sql);
      if ($query_update) {
            header('location: welcome.php?status=success');
        } else {
            header('location: welcome.php?status=fail');
        }
    }


?>