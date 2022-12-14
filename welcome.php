<?php
    include("mysql.php");
    session_start();
        if(!isset($_SESSION['id'])) {
        header('location: login.php?error=noLogin');
        exit;
    }
    include_once 'header.php';

    function CallMySQL($sqlQuery) {
        global $mySQL;

        $json = [];
        $users = [];
        $id = $_SESSION['id'];

        $sqlQuery = "SELECT * FROM userInfo WHERE id='$id'";
        $result = $mySQL->query($sqlQuery);

        while($row = $result->fetch_object()){
            $users[] = $row;
        }
       
        $json["users"] = $users;

        return json_encode($json);
    }
    
        $sql = "SELECT * FROM userInfo";
        $data = json_decode(CallMySQL($sql));
        foreach($data as $user){
            foreach($user as $info){
            echo '<div class="form-form-register"><h1 style="text-align:center"> Velkommen '.$info->firstname.' '.$info->lastname.'!</h1><br>
            <p style="text-align: center">Herunder kan du rediger i dine informationer og opdatere når alt er som det skal være!</p>';
            if (isset($_GET["status"])) {
                if ($_GET["status"] == "success") {
                    echo "<p class='update_success'>Din information blev opdateret</p>";
                }
                else if ($_GET["status"] == "fail") {
                    echo "<p class='update_fail'>Noget gik galt, prøv igen</p>";
                }
                else if ($_GET["status"] == "fail_empty") {
                    echo "<p class='update_fail'>Opdatering gik ikke igennem. Husk at udfylde alle felter</p>";
                }
                else if ($_GET["status"] == "age_fail") {
                    echo "<p class='update_fail'>Vi vil alle være unge for evigt, men så ung kan man desværre ikke være - prøv igen!</p>";
                }
                else if ($_GET["status"] == "loggedin") {
                    echo "<p class='loggedin'>Hovsa, du har allerede en bruger - ser her!</p>";
                }
            }
        
            echo '<form  action="update.php" name="register" method="post">
            Fornavn: <input type="text" name="firstname" value="'.$info->firstname.'"><br>
            Efternavn: <input type="text" name="lastname" value="'.$info->lastname.'"><br>
            Højde: <input type="number" name="height" value="'.$info->height.'"><br>
            Alder: <input type="text" name="age" value="'.$info->age.'"><br>
            <button class="update-button" type="submit" name="update">Opdater</button>

            </form></div>';
        }
     }

     
          include_once 'footer.php';
?>
