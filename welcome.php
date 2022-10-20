<?php
    include("mysql.php");
    session_start();
        if(!isset($_SESSION['id'])) {
        header('location: login.php?error=wrongLogin');
        exit;
    }
    include_once 'header.php';

    function CallMySQL($sqlQuery) {
        // Get access to the global variable $mySQL from the mysql.php script
        global $mySQL;

        // Creates an empty array, in which you can store the data
        $json = [];
        $users = [];
        $id = $_SESSION['id'];

        $sqlQuery = "SELECT * FROM userInfo WHERE username='$id'";
        $result = $mySQL->query($sqlQuery);
        while($row = $result->fetch_object()){
            $users[] = $row;
        }
       
        $json["users"] = $users;

        return json_encode($json);

    }


    /* 
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM userInfo WHERE username='$id'";
    $result = mysqli_query($mySQL, $sql);
            
        echo mysqli_num_rows($result);
        exit();
        // while ($row = $result->fetch_object()) {
          //  $user[] = $row; } */

    
?>
Welcome <?php echo $_POST["firstname"] . " " . $_POST["lastname"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?><br>
Your password is: <?php echo $_POST["password"];?><br>
Gender: <?php echo $_POST["gender"]; ?>



<?php 






    include_once 'footer.php';
?>