<?php
session_start();
require "../../connection.php";

if ( empty($_SESSION["login"]) ) header ("Location: ../../login.php?res=2");

function createGrade($val) {
  $num = intval($val);
  if ( $num >= 85 ) return 'A';
  else if ( $num >= 75 && $num < 85 ) return 'B';
  else if ( $num >= 65 && $num < 75 ) return 'C';
  else if ( $num >= 50 && $num < 65 ) return 'D';
  else return 'E';
}

if ( isset( $_POST["create"] ) )
{
  // Parse array
  $id_mhs = $_POST["id_mhs"];
  $mata_kuliah = $_POST["mata_kuliah"];
  $nilai = $_POST["nilai"];
  $grade = createGrade($nilai);

  $SQL = "INSERT INTO nilai VALUES (NULL, $id_mhs, '$mata_kuliah', '$nilai', '$grade')";
  $query_results = mysqli_query($conn, $SQL);

  if ( !mysqli_error($conn) ) header ("Location: ./index.php?res=1");
  else header ("Location: ./index.php?res=0");
}


?>
