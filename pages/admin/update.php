<?php
session_start();

require "../../connection.php";

if ( empty($_SESSION["login"]) ) header ("Location: ../../login.php?res=2");

if ( isset($_POST["update"]) )
{
  // Parse array
  $username = $_POST["username"];
  
  // Available format
  $valid_format = ['jpg', 'jpeg', 'png'];

  // Get files
  $avatar = $_FILES['avatar']['name'];
  $tmp = $_FILES['avatar']['tmp_name'];
  $size = $_FILES['avatar']['size'];

  $extension = strtolower(end(explode('.', $avatar)));
  $file = date('His') . '.' . $extension;

  if ( in_array($extension, $valid_format) ) {
    move_uploaded_file($tmp, '../../src/' . $file);

    // Update SQL
    $SQL = "UPDATE admin SET username = '$username', avatar = '$file'";
    $query_results = mysqli_query($conn, $SQL);

    if ( !mysqli_error($conn) ) header ("Location: index.php?res=1");
    else header ("Location: index.php?res=0");
  } else {
    header ("Location: index.php?res=0");
  } 
}
?>
