<?php
    include("mysql.php");
//    include("Userclass.php");

//    echo $_POST["firstname"].$_POST["lastname"].$_POST["username"].$_POST["password"].$_POST["gender"];

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






if (password_verify($password,$hashed_password)) 
{
  echo "din login"; 
} else 
  {
  echo "nej login";

};



    header('location: register.php');









    /*
    $myUser = new User("Male", "23", "blond");
    
    
    $sql = "SELECT * FROM persons ORDER BY id ASC";
    $result = $mySQL->query($sql);

    while($row = $result->fetch_object()) {

        $user = new User($row->sex, $row->age, $row->haircolor);
        echo $user->InformationCard();
    }
    */
?>