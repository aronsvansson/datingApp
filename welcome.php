<?php
    include_once 'header.php';
?>
Welcome <?php echo $_POST["firstname"] . " " . $_POST["lastname"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?><br>
Your password is: <?php echo $_POST["password"];?><br>
Gender: <?php echo $_POST["gender"]; ?>

<?php 
    include_once 'footer.php';
?>