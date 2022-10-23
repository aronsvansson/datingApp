// Hej KATO. Vi lavede først backenden til match-siden i dette dokument. Men vi kunne simpelthen ikke få informationen med videre i match.php filen. Vi beklager at det
ikke kunne laves "ordentligt", så vi har stoppet backenden ind i match.php så informationen aldrig mistes ved side-skift. 

<!-- 
    include("mysql.php");
    session_start();
        if(!isset($_SESSION['id'])) {
        header('location: login.php?error=wrongLogin');
        exit;
    }
    include_once 'header.php';
        
    $id = $_SESSION["id"];

            $sql_user = "SELECT * FROM userInfo WHERE id='$id'";
            $result = $mySQL->query($sql_user);
            $row = $result->fetch_assoc();

            $userHeight = $row["height"];
            $userAge = $row["age"];
            $userGender = $row["gender"];

            $heightSearch = $_REQUEST["height"];
            $ageSearch = $_REQUEST["age"];
            $genderSearch = $_REQUEST["gender"];


        if(isset($_POST['match'])) {

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
            foreach($data as $user){
                foreach($user as $info){
                echo $info->firstname;
                }
            }
        }
        include_once 'footer.php';
        ?>
