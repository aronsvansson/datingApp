<?php 
    include("mysql.php");
?>

<html>
<body>

<form action="backend.php" name="register" method="post">
Fornavn: <input type="text" name="firstname" required><br>
Efternavn: <input type="text" name="lastname" required><br>
Højde: <input type="number" name="height" required><br>
Alder: <input type="text" name="age" required><br>
Køn: <input type="text" name="gender" required><br>
Brugernavn: <input type="text" name="username" required><br>
Kodeord: <input type="password" name="password" required><br>
Gentag kodeord: <input type="password" name="passwordRepeat" required><br>
<input type="submit" name="submit">

</form>

</form>

</body>
</html>