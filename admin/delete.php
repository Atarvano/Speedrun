<?php
include("../php/koneksi.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM mahasiswa WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    if ($result) {
        header('location:index.php');
    }
}
?>