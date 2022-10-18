<?php
    $server = "mysql106.unoeuro.com"; // Change to domain name, e.g. www.iloveunicorns.com
    $username = "waskiw_com"; // Change to the admins username of the server
    $password = "F3hpy2nxRfzG"; // Change to the admins password of the server
    $database = "waskiw_com_db_first";

$mySQL = new mysqli($server, $username, $password, $database);

if(!$mySQL) {
die("Could not connect to the MySQL server: " . mysqli_connect_error());
}

?>