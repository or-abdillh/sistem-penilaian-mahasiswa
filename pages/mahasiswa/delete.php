<?php

require "../../connection.php";

if ( isset( $_GET["id"] ) )
{
  // Get id
  $id = $_GET["id"];
  $SQL = "DELETE FROM mahasiswa WHERE id = $id";
  $query_results = mysqli_query($conn, $SQL);

  if ( !mysqli_error($conn) ) header ("Location: ./index.php?res=1");
  else header ("Location: ./index.php?res=0");
}


?>
