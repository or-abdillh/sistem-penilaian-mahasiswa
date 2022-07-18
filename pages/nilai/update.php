<?php
session_start();
require "../../connection.php";

if ( empty($_SESSION["login"]) ) header ("Location: ../../login.php?res=2");

if ( isset($_GET["id"]) )
{
  // Get id
  $id = $_GET["id"];
  $SQL = "SELECT mahasiswa.nama, nilai.id_mhs, nilai.mata_kuliah, nilai.id, nilai.nilai, nilai.grade FROM mahasiswa INNER JOIN nilai ON mahasiswa.id = nilai.id_mhs AND nilai.id = $id";
  $rows = [];

  $query_results = mysqli_query($conn, $SQL);
  while ( $row = mysqli_fetch_assoc($query_results) ) $rows[] = $row;

}

if ( isset($_POST["update"]) )
{
  function createGrade($val) {
    $num = intval($val);
    if ( $num >= 85 ) return 'A';
    else if ( $num >= 75 && $num < 85 ) return 'B';
    else if ( $num >= 65 && $num < 75 ) return 'C';
    else if ( $num >= 50 && $num < 65 ) return 'D';
    else return 'E';
  }

  //parse array
  $id = $_POST["id"];
  $nilai = $_POST["nilai"];
  $grade = createGrade($nilai);
  
  $SQL = "UPDATE nilai SET nilai = '$nilai', grade = '$grade' WHERE id = $id";
  $query_results = mysqli_query($conn, $SQL);

  if ( !mysqli_error($conn) ) header ("Location: ./index.php?res=1");
  else header ("Location: ./index.php?res=0");
}

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

   <title>Sistem Penilaian Mahasiswa - Update Nilai Mahasiswa</title>
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
      <h2>Update Nilai Mahasiswa</h2>
      <p>Data yang bisa diubah hanya meliputi nilai</p>
      <hr class="my-2" />
      </button>
    </section>
    <!-- Jumbotron -->

    <!-- Menu -->
    <section class="container-md">
      <form id="form-create" action="./update.php" method="POST" class=""> 
        <!-- Form update Data --> 
<?php
// Parse array 
$id_mhs = $rows[0]["id_mhs"];
$nama = $rows[0]["nama"];
$mata_kuliah = $rows[0]["mata_kuliah"];
$nilai = $rows[0]["nilai"];

echo <<<EOT
        <input type="hidden" name="id" value="$id">
        <div class="mb-3">
          <label for="NIM" class="form-label">Nama Mahasiswa</label>
          <input type="text" class="form-control" required value="$nama" disabled>
        </div> 
        <div class="mb-3">
          <label for="nama" class="form-label">Mata Kuliah</label>
          <input type="text" class="form-control" value="$mata_kuliah" disabled>
        </div> 
        <div class="mb-3">
          <label for="program_studi" class="form-label">Nilai</label>
          <input type="number" class="form-control" name="nilai" value="$nilai" required>
        </div> 
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
      </div>
EOT;
?>
      </form>
    </section>
  </main>
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
