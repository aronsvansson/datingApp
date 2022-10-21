<?php
session_start();
    include("mysql.php");
    include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Forside</title>
</head>
<body>
    <h1 class="overskrift">Velkommen til kærlighedens kælder, hvor alle kan finde sin næste partner!</h1>
    <div class="forside-knapper">
    <?php 
            if(isset($_SESSION['id'])) {
                echo "<li><a href='welcome.php'>Profil</a></li>";
                echo "<li><a href='match.php'>Find dit match</a></li>";
                echo "<li><a href='logout.php'>Log ud</a></li>";
            } else {
                echo "<li><a href='register.php'>Tilmeld</a></li>";
                echo "<li><a href='login.php'>Log in</a></li>";
            }
            ?>
    </div>

<?php
    include_once 'footer.php';
?>
