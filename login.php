<?php 
    include("mysql.php");
    session_start();

    if (isset($_SESSION['token'])) {
        header('location: profile.php');
    }
?>

<html>
<body>

<form action="login-backend.php" method="post">
Brugernavn: <input type="text" name="username">
Kodeord: <input type="password" name="password">
<input type="submit" value="Login">

<a href="register.php">Klik her for at oprette en konto</a>
</form>

</body>
</html>