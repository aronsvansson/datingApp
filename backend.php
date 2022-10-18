<?php
    include("mysql.php");
//    include("Userclass.php");

//    echo $_POST["firstname"].$_POST["lastname"].$_POST["username"].$_POST["password"].$_POST["gender"];

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $height = $_POST["height"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $signUpPersonalInfo = "INSERT INTO userInfo (firstname, lastname, height, age, gender)
    VALUES ('$firstname','$lastname','$height','$age','$gender')";
    $mySQL = $mySQL->query($signUpPersonalInfo);

 
    $findUser = "SELECT id FROM userInfo ORDER BY id DESC LIMIT 1";
    $response = $mySQL -> query($findUser);
    $data = $response->fetch_object();
    

    $signupPass = "INSERT INTO userPass (id, username, password) 
    VALUES ('$data->id','$username', '$password')";
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