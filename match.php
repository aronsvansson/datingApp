<?php
    include("mysql.php");
    session_start();
    include_once("header.php");

    if(!isset($_SESSION['id'])) {
        header('location: login.php?error=noLogin');
        exit;
    }
    include_once 'header.php';

    if(isset($_POST['height']) !=""){
    $_SESSION['height'] = $_POST['height'];}

    if(isset($_POST['age']) !=""){
    $_SESSION['age'] = $_POST['age'];}
?>

<form class="match-bar" action="" name="register" method="post">
    <h2>Hvad ønsker du i dit næste match?</h2>
    <p style="font-size: 12px;">KATO! Prøv f.eks: Højde: 162, Alder: 27 Køn: Kvinde!</p>
    <div class="match-search">
            <div class="register-info">
                <label for="firstname">Højde (cm)</label>
                <input type="text" name="height" <?php if(isset($_SESSION['height'])!=""){ 
                    echo " value='".$_SESSION['height']."'"; }?>
                ><br>
                </div>
            <div class="register-info">
                <label for="lastname">Alder</label>
                <input type="text" name="age" <?php if(isset($_SESSION['age'])!=""){ 
                    echo " value='".$_SESSION['age']."'"; }?>><br>
                    </div>
            <div class="register-info">
                <label for="gender">Køn</label>
                <select class="match-select" type="text" name="gender">
                    <option value="mand">Mand</option>
                    <option value="kvinde">Kvinde</option>
                </select><br>
            </div>
            </div>
            <button type="submit" name="match">Find mit match</button>
</form>


    <?php
    $id = $_SESSION["id"];


        if(isset($_POST['match'])) {

            $sql_user = "SELECT * FROM userInfo WHERE id='$id'";
            $result = $mySQL->query($sql_user);
            $row = $result->fetch_assoc();

            $userHeight = $row["height"];
            $userAge = $row["age"];
            $userGender = $row["gender"];

            $heightSearch = $_REQUEST["height"];
            $ageSearch = $_REQUEST["age"];
            $genderSearch = $_REQUEST["gender"];

            function CallMySQL($sqlQuery) {
            global $mySQL;

            $resultSearch = $mySQL->query($sqlQuery);
            $json = [];
            $matchResult = [];

                while($rowSearch = $resultSearch->fetch_assoc()) 
                {
                    $matchResult[] = $rowSearch;
                } 
                   $json["matchResults"] = $matchResult;
                    return json_encode($json);
            
            }
  
            $sql = "SELECT * FROM userInfo WHERE gender='$genderSearch' AND height='$heightSearch' AND AGE='$ageSearch'";
            $data = json_decode(CallMySQL($sql));
    // Hej KATO. Dette if-statement kan vi simpelthen ikke få til at samarbejde. Vi har elleres sat den til at afhænge af $data variablen, som altså indeholder alle matchende brugere i databasen.
    // Dog, ved at bruge var_dump, kan vi se at den ALTID er ligmed false - OGSÅ når den faktisk finder brugere der matcher. Det betyder at den aldrig viser "Øv, ingen matches" fordi den aldrig er "tom".
    // Den viser dog de matches vi i databasen har fundet. 
            if (empty($data)) {
                    echo "<div class='match-result'><h2>Øv, ingen matches:(</h2><div>";
                    exit;
            } else {
                foreach($data as $user){
                foreach($user as $info){
                echo "<div class='match-result'><div><p>MATCH! "
                .$info->firstname." ".$info->lastname." er ".$info->age." år gammel og ".$info->height." cm høj</p></div></div>";
                } 
            }
            
        }
        }
        include_once 'footer.php';
?>
