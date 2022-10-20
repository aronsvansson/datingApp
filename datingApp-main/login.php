<?php 
    include("mysql.php");
    
    session_start();
    include_once 'header.php';

    if (isset($_SESSION['token'])) {
        header('location: profile.php');
    }
?>

<!-- login form -->    
<section class="signup-form">
    <h2>Login</h2>
    <div class="signup-form-form">
     <form action="login-backend.php" method="post">
         <input type="text" name="username" placeholder="Brugernavn / Email...">
         <input type="password" name="password" placeholder="Adgangskode...">
         <button type="submit" name="submit">Login</button>
         
         <a href="register.php">Klik her for at oprette en konto</a>
     </form>
    </div>
</section>
<?php
 include_once 'footer.php';
?>


<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyField") {
            echo "<p>Udfyld alle felter </p>";
        }
        else if ($_GET["error"] == "noUser") {
            echo "<p>Ingen bruger fundet </p>";
        }
    }
?>