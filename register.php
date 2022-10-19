<?php 
    include("mysql.php");
?>

<html>
<body>

<form action="backend.php" name="register" method="post">
Fornavn: <input type="text" name="firstname"><br>
Efternavn: <input type="text" name="lastname"><br>
Højde: <input type="number" name="height"><br>
Alder: <input type="text" name="age"><br>
Vælg køn: <select type="text" name="gender">
    <option value="mand">Mand</option>
    <option value="kvinde">Kvinde</option>
</select><br>
Brugernavn: <input type="text" name="username"><br>
Kodeord: <input type="password" name="password"><br>
Gentag kodeord: <input type="password" name="passwordRepeat"><br>
<input type="submit" name="submit">

</form>

</form>

</body>
</html>