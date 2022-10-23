<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="wrapper">
         <a href ="index.php"><h1>Dating App</h1></a>
        <ul>
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
        </ul>
        </div>
    </nav>