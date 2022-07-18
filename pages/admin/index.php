<?php
session_start();

require "../../connection.php";

if ( empty( $_SESSION["login"] ) ) header ("Location: ../../login.php?res=2");

$SQL = "SELECT * FROM admin";
$query_results = mysqli_query($conn, $SQL);
$rows = [];

while ( $row = mysqli_fetch_assoc($query_results) ) $rows[] = $row;

?>

<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
	<!-- Font Awesome 6 -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>  
	
	<!-- App css -->
	<link rel="stylesheet" href="../../src/index.css">

	<!-- Poppins Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

   <title>Sistem Penilaian Mahasiswa - Admin</title>
  </head>
  <body>

  <!-- Nav Bar -->
  <nav class="navbar navbar-light bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="../../index.php">Sistem Penilaian Mahasiswa</a>
    </div>
  </nav>

  <main class="container-md">
    <!-- Jumbotron -->
    <section class="p-4 shadow-4 rounded-3 bg-white text-center px-5 pt-5">
      <h2>Admin</h2>
      <p>Kelola data admin, username, password dan avatar</p>
      <hr class="my-2" />
      </button>
    </section>
    <!-- Jumbotron -->

<?php

if (isset( $_GET["res"] ))
{
  switch ($_GET["res"]) {
  case 1 :
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Action success!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    break;
  case 0 : 
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Action failed!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    break;
  }
}

?>
    
    <div class="container-md mb-5">
      <a class="px-3 btn btn-danger" href="logout.php">Log Out</a>
    </div>

    <form action="update.php" method="POST" enctype="multipart/form-data">  
<?php

// Parse array
$username = $rows[0]["username"];
$password = $rows[0]["password"];
$avatar = $rows[0]["avatar"];

echo <<<EOT
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="username" class="form-control" name="username" value="$username">
  </div> 
  <div class="mb-3">
    <img src="../../src/$avatar" class="img-thumbnail"/>  
    <label for="avatar" class="form-label">Avatar</label>
    <input type="file" class="form-control" name="avatar" required>
  </div>

EOT;
?>
      <button class="btn btn-primary" type="submit" name="update">Update</button>
    </form>
    </main>

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
