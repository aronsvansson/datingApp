<?php 
    include("mysql.php");

    class User {
        public $firstname;
        public $lastname;
        public $height;
        public $age;
        public $gender;
        public $username;
        public $password;


        function __construct($username, $password){

            $this->username = $username;
            $this->password = $password;
        }

        function InformationCard(){
            return '<div>' . $this->username . $this->password . '</div>';
        }
    }

    $sqllist = "SELECT * FROM userInfo ORDER BY id DESC LIMIT 1";
    $recent = $mySQL->query($sqllist);


?>

<html>
<body>


<form action="backend.php" method="post">
Firstname: <input type="text" name="firstname"><br>
Lastname: <input type="text" name="lastname"><br>
Height: <input type="number" name="height"><br>
Age: <input type="text" name="age"><br>
Gender: <input type="text" name="gender"><br>
Username: <input type="text" name="username"><br>
Password: <input type="text" name="password"><br>

<input type="submit">
</form>

<form action="backend.php" method="post">
E-mail: <input type="text" name="username">
Password: <input type="password" name="password">

</form>

</body>
</html>