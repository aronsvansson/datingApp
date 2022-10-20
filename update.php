<?php
    include("mysql.php");

    $id = $_SESSION['username'];

    if(isset($_POST['submit'])) {

        $firstname = $_REQUEST["firstname"];
        $lastname = $_REQUEST["lastname"];
        $height = $_REQUEST["height"];
        $age = $_REQUEST["age"];
        $gender = $_REQUEST["gender"];
        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];
        $passwordRepeat = $_REQUEST["passwordRepeat"];

        $sql_user = "UPDATE * FROM userInfo WHERE username='$id'";
        $res_user = mysqli_query($mySQL, $sql_user) or die(mysqli_error($mySQL));
        $hej = $row["id"];
        echo $hej;

        }


?>