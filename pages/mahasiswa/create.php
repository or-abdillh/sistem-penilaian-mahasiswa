<?php

require "../../connection.php";

if ( isset( $_POST["create"] ) )
{
  // Parse array
  $NIM = $_POST["NIM"];
  $nama = $_POST["nama"];
  $program_studi = $_POST["program_studi"];
  $no_hp = $_POST["no_hp"];

  $SQL = "INSERT INTO mahasiswa VALUES (NULL, '$NIM', '$nama', '$program_studi', '$no_hp')";
  $query_results = mysqli_query($conn, $SQL);

  if ( !mysqli_error($conn) ) header ("Location: ./index.php?res=1");
  else header ("Location: ./index.php?res=0");
}

?>
