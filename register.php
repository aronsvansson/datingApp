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


?>

<html>
<body>


<form action="backend.php" method="post">
Fornavn: <input type="text" name="firstname" required><br>
Efternavn: <input type="text" name="lastname" required><br>
Højde: <input type="number" name="height" required><br>
Alder: <input type="text" name="age" required><br>
Køn: <input type="text" name="gender" required><br>
Brugernavn: <input type="text" name="username" required><br>
Kodeord: <input type="password" name="password" required><br>

<input type="submit">
</form>

<form action="backend.php" method="post">
Brugernavn: <input type="text" name="username">
Kodeord: <input type="password" name="password">

</form>

</body>
</html>