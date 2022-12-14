<?php
    include("mysql.php");
    session_start();

    if(isset($_POST['submit'])) {

        $firstname = $_REQUEST["firstname"];
        $lastname = $_REQUEST["lastname"];
        $height = $_REQUEST["height"];
        $age = $_REQUEST["age"];
        $gender = $_REQUEST["gender"];
        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];
        $passwordRepeat = $_REQUEST["passwordRepeat"];

        if(isset($_POST['firstname']) !=""){
        $_SESSION['firstname'] = $_POST['firstname'];}

        if(isset($_POST['lastname']) !=""){
        $_SESSION['lastname'] = $_POST['lastname'];}

        if(isset($_POST['height']) !=""){
        $_SESSION['height'] = $_POST['height'];}

        if(isset($_POST['age']) !=""){
        $_SESSION['age'] = $_POST['age'];}

        if(isset($_POST['username']) !=""){
        $_SESSION['username'] = $_POST['username'];}
        

        $sql_user = "SELECT * FROM userPass WHERE username='$username'";
        $res_user = mysqli_query($mySQL, $sql_user) or die(mysqli_error($mySQL));

        if(empty($firstname) || empty($lastname) || empty($height) || empty($age) || empty($gender) || empty($username) || empty($password)){
            header('location: register.php?error=emptyField');
            exit();
        }
        
        if (mysqli_num_rows($res_user) > 0 ) {
            $_SESSION['username'] = "";
            header('location: register.php?error=userTaken');
            exit();
        }
        
        if($password !== $passwordRepeat){
            header('location: register.php?error=wrongPassword');
            exit();
        }

         else {
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

            unset($_SESSION['firstname']);
            unset($_SESSION['lastname']);
            unset($_SESSION['height']);
            unset($_SESSION['age']);
            unset($_SESSION['username']);

            header('location: register.php?error=none');
            }
        }

?>