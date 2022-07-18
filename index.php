<?php
session_start();
if ( empty($_SESSION["login"]) ) header ("Location: ./login.php?res=2");

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
	<link rel="stylesheet" href="./src/index.css">

	<!-- Poppins Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

   <title>Sistem Penilaian Mahasiswa - Beranda</title>
  </head>
  <body>

  <!-- Nav Bar -->
  <nav class="navbar navbar-light bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">Sistem Penilaian Mahasiswa</a>
    </div>
  </nav>

  <main class="container-md">
    <!-- Jumbotron -->
    <section class="p-4 shadow-4 rounded-3 bg-white text-center px-5 pt-5">
      <h2>Selamat Datang</h2>
      <p>Di Sistem Penilaian Mahasiswa Politeknik Hasnur</p>
      <hr class="my-2" />
      </button>
    </section>
    <!-- Jumbotron -->

    <!-- Menu -->
    <section class="container md:d-flex justify-content-center gap-3">
      <!-- Card -->
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title">Kelola Data Mahasiswa</h5>
          <p class="card-text">Data mahasiswa meliputi NIM, nama, program studi, dan nomor handphone mahasiswa</p>
          <a href="pages/mahasiswa" class="btn btn-primary">Lanjut</a>
        </div>
      </div>
      <!-- Card -->
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title">Kelola Data Nilai</h5>
          <p class="card-text">Data nilai meliputi nama mahasiswa, mata kuliah, nilai dan grade</p>
          <a href="pages/nilai" class="btn btn-primary">Lanjut</a>
        </div>
      </div>
      <!-- Card -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Kelola Data Admin</h5>
          <p class="card-text">Data admin meliputi username, password, dan avatar</p>
          <a href="pages/admin" class="btn btn-primary">Lanjut</a>
        </div>
      </div>
   </section>
</main>

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
