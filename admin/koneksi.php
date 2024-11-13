<?php
$SERVER = "localhost";
$USER = "root";
$PASSWORD = "";
$database = "iteba";

$db = mysqli_connect($SERVER, $USER, $PASSWORD, $database);
if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>