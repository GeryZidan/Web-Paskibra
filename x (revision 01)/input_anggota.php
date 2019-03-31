<?php 
  session_start();
  if(!isset($_SESSION["u_email"])){
    header("location:login.php");
  }
  if ($_SESSION['u_level'] == 'admin') {
?>

<!doctype html>
<html lang="en">
<html>
<head>
  <title>Input Anggota | Paskib Bandung</title>
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
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari disini..." aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>&emsp;&emsp;
          </form>
        </div>
      </nav>
    <!--/navbar-->
  
  <!--isi-->
  <div class="isi">
    <div class="col-sm-12 form-informasi">
      <form action="proses_input_a.php" method="GET">
        <center><h2>TAMBAH ANGGOTA</h2></center><br>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">NRA</label>
              <input name="nra" rows="1" class="form-control" id="exampleFormControlTextarea1" placeholder="Tulis nra disini..."><br>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">NAMA LENGKAP</label>
              <input name="nama" rows="1" class="form-control" id="exampleFormControlTextarea1" placeholder="Tulis nama disini..."><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">SATUAN</label>
              <input name="satuan" rows="1" class="form-control" id="exampleFormControlTextarea1" placeholder="Tulis satuan disini..."><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">ANGKATAN</label>
              <input name="angkatan" rows="1" class="form-control" id="exampleFormControlTextarea1" placeholder="Tulis angkatan disini..."><br>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">KEBIDANGAN</label>
              <input name="kebidangan" rows="1" class="form-control" id="exampleFormControlTextarea1" placeholder="Tulis kebidangan disini..."><br>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">EMAIL</label>
              <input name="email" rows="1" class="form-control" id="exampleFormControlTextarea1" placeholder="Tulis email disini..."><br>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">PASSWORD</label>
              <input name="password" rows="1" class="form-control" id="exampleFormControlTextarea1" placeholder="Tulis password disini..."><br>
            </div>
          </div>
        </div>
        <center><button type="submit" name="upload_a" class="btn btn-outline-light">TAMBAH ANGGOTA</button></center>
      </form>
    </div>
  </div>
  <!--/isi-->

  <!--footer-->
  <footer class="page-footer font-small blue pt-4"">
      <div class="container-fluid myfoot text-center text-md-left">
        <div class="row" style="padding-top: 20px; padding-bottom: 20px">
            <div class="col-md-6 mt-md-0 mt-3">
          <div class="tag"></div>
              <h5 class="text-uppercase" style="margin-left: 20px">PASKIBRA KOTA BANDUNG</h5>
              <p style="margin-left: 10px">
                Paskibraka adalah singkatan dari Pasukan Pengibar Bendera Pusaka dengan tugas utamanya mengibarkan duplikat bendera pusaka dalam upacara peringatan proklamasi kemerdekaan Indonesia di 3 tempat, yakni tingkat Kabupaten/Kota (Kantor Bupati/Wali Kota), Provinsi (Kantor Gubernur), dan Nasional (Istana Merdeka).
              </p>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mb-md-0 mb-3"></div>
            <div class="col-md-3 mb-md-0 mb-3">
              <h5 class="text-uppercase">Instagram</h5>
                <ul class="list-unstyled">
                  <li>
                    <a class="merah" href="https://www.instagram.com/ppikotabandung/">@ppikotabandung</a>
                  </li>
                  <li>
                    <a class="merah" href="https://www.instagram.com/gembira18/">@gembira18</a>
                  </li>
                  <li>
                    <a class="merah" href="https://www.instagram.com/paskibra.kotabandung/">@paskibra.kotabandung</a>
                  </li>
            </div>
        </div>
      </div>
      <div class="footer-copyright myfoot2 text-center py-3">© 2019 Copyright .
        <a class="merah" href="#"> belumdihosting.com</a>
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