<?php
header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "";
$basename = "webprojekt";
$port = 3306;

$dbc = mysqli_connect($servername, $username, $password, $basename, $port);

if (!$dbc) {
    die("Greška kod spajanja na bazu: " . mysqli_connect_error());
}

mysqli_set_charset($dbc, "utf8mb4");
?>