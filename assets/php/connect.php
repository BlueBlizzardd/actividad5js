<?php

$host = "localhost";
$user = "id20904698_ejuliao";
$pass = "Elmatadordebarquisimeto69.";
$db = "id20904698_cansaoya";

$conn = mysqli_connect($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>