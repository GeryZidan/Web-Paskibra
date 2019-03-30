<?php
  session_start();
  if(!isset($_SESSION["u_email"])){
    header("location:login.php");
  }
  if ($_SESSION['u_level'] == 'admin') {
  include ('koneksi.php');

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get gambar name
    $gambar = $_FILES['gambar']['name'];
    // Get text
    $isi_postingan = mysqli_real_escape_string($koneksi, $_POST['isi_postingan']);
    $waktu = date("d.m.y");
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);

    // gambar file directory
    $target = "img/".basename($gambar);

    $sql = "INSERT INTO informasi (judul, waktu, gambar, isi_postingan) VALUES ('$judul', '$waktu', '$gambar', '$isi_postingan')";
    // execute query
    mysqli_query($koneksi, $sql);

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
      $msg = "Sukses mengupload gambar !";
    }else{
      $msg = "Ada kesalahan saat mengupload gambar";
    }
  }
  $tampil = "SELECT * FROM informasi";
  $hasil = mysqli_query($koneksi, $tampil);
?>

<!doctype html>
<html lang="en">
<html>
<head>
  <title>Input Informasi | Paskib Bandung</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="img/logoo.png" rel="shortcut icon">
</head>
<body>

  <!--navbar-->
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-nav">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-navicon"><h2>=</h2></i>
       </button>
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" width="90px" height="30px">
          </a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="informasi.php">INFORMASI<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="materi.php">MATERI</a>
            </li>
            <?php
            if ($_SESSION['u_level'] == 'admin') {
              echo "<li class='nav-item'>
                <a class='nav-link' href='anggota.php'>ANGGOTA</a>
              </li>";
            }elseif ($_SESSION['u_level'] == 'user') {
              echo "<li class='nav-item'>
                <a class='nav-link' href='anggota.php'>ANGGOTA</a>
              </li>";
            }else{

            }
            ?>
             <li>
              <?php
              if ($_SESSION['u_level'] == 'admin') {
                echo "<div class='dropdown'><a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                  echo  $_SESSION['u_nama']."</a>";
                  echo "<div class='dropdown-menu' aria-labelledby='navbarDropdown'>";
                  echo "  <a class='dropdown-item' href='informasi_atur.php'>Atur Informasi</a>";
                  echo "  <a class='dropdown-item' href='input_anggota.php'>Tambah Anggota</a>";
                  echo "  <a class='dropdown-item' href='materi.php'>Tambah Materi</a>";
                  echo "  <a class='dropdown-item' href='logout.php'>Log Out</a></div></div>";

              }else if($_SESSION['u_level'] == 'user') {
                echo "<div class='dropdown'><a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                  echo  $_SESSION['u_nama']."</a>";
                  echo "<div class='dropdown-menu' aria-labelledby='navbarDropdown'>";
                  echo "  <a class='dropdown-item' href='logout.php'>Log Out</a></div></div>";
              }else{
                echo "<a href='login.php'><button class='btn btn-danger my-2 my-sm-0' type='submit'>Login</button></a>";
              }
            ?>
            </li>
          </ul>
        </div>
      </nav>
    <!--/navbar-->
  
  <!--isi-->
  <div class="isi">
    <div class="col-sm-12 form-informasi">
      <form method="POST" action="input_informasi.php" enctype="multipart/form-data">
        <center><h2>TAMBAH INFORMASI</h2></center><br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">JUDUL</label>
          <input name="judul" rows="1" class="form-control" id="exampleFormControlTextarea1" placeholder="Tulis judul disini..."><br>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">GAMBAR</label><br>
          <input type="hidden" name="MAX_FILE_SIZE" value="4194304">
          <input type="file" name="gambar">(gambar maksimal 4MB)<br><br>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">ISI</label>
          <textarea name="isi_postingan" class="form-control" id="exampleFormControlTextarea1" placeholder="Tulis informasi disini..." rows="3"></textarea><br>
        </div>
        <center><button type="submit" name="upload" class="btn btn-outline-light">POSTING</button></center>
      </form>
    </div>
  </div>
  <!--/isi-->

  <!--footer-->
  <footer class="page-footer font-small blue pt-4">
      <div class="container-fluid myfoot text-center text-md-left">
        <div class="row" style="padding-top: 20px; padding-bottom: 20px">
            <div class="col-md-6 mt-md-0 mt-3">
          <div class="tag"></div>
              <h5 class="text-uppercase" style="margin-left: 20px">PASKIBRA KOTA BANDUNG</h5>
              <p style="margin-left: 10px">banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.banyak amat loremnya.</p>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mb-md-0 mb-3"></div>
            <div class="col-md-3 mb-md-0 mb-3">
              <h5 class="text-uppercase">Links</h5>
                <ul class="list-unstyled">
                  <li>
                    <a class="merah" href="#!">Link 1</a>
                  </li>
                  <li>
                    <a class="merah" href="#!">Link 2</a>
                  </li>
            </div>
        </div>
      </div>
      <div class="footer-copyright myfoot2 text-center py-3">© 2019 Copyright .
        <a class="merah" href="#"> hahahaha.com</a>
      </div>
  </footer>
  <!--/footer-->

</body>
</html>

<?php
}else{
  header("location:index.php");
} 
?>