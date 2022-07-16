<?php

$username = "root";
$password = "";
$database = "db_penilaian_mahasiswa";
$hostname = "localhost";

$conn = mysqli_connect($hostname, $username, $password, $database);

if ( !$conn ) die("koneksi gagal");


?>
