<?php 
  session_start();
  if(!isset($_SESSION["u_email"])){
    header("location:login.php");
  }
?>

<!doctype html>
<html lang="en">
<html>
<head>
  <title>Informasi | Paskib Bandung</title>
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
          <form class="form-inline my-2 my-lg-0" action="search_i.php">
            <input name="key" class="form-control mr-sm-2" type="search" placeholder="Cari disini..." aria-label="Search">
            <button name="cari" class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>&emsp;&emsp;
          </form>
        </div>
      </nav>
    <!--/navbar-->
  
  <!--isi-->
    <?php
      $id = $_GET['id'];
      include ('koneksi.php');
      $tampil = "SELECT * FROM informasi WHERE id_informasi = '$id'";
      $hasil = mysqli_query($koneksi, $tampil);
      $row = mysqli_fetch_array($hasil);
    ?>

    <!--
    <table class="isi2">
      <tr valign="top">
        <td width="70%" style="padding: 80px 10px 10px 0px">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                ?php echo "<div class='tag2'></div><div id='judul2'>".$row['judul']."</div><div id='waktu2'>".$row['waktu']."</div>"; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                ?php echo "<center><img id='img_div2' src='img/".$row['gambar']."'></div></center>"; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                ?php echo "<br><br><div id='postingan'>".$row['isi_postingan']."</div>"; ?>
              </div>
            </div>
          </div>
        </td>
        <td width="30%" style="background-color:rgb(30,30,30);color: white ;padding: 80px 0px 0px 20px">
          <div class="container-fluid">
            <div style="margin-left: 20px " class="tag"></div>
            <h4 style="margin: 0px 0px 40px 40px ">INFORMASI TERBARU</h4>
            ?php
              $tampil2 = "SELECT * FROM informasi ORDER BY id_informasi DESC LIMIT 5";
              $hasil2 = mysqli_query($koneksi, $tampil2);
                while ($row2 = mysqli_fetch_array($hasil2)){
                  echo "<a href='postingan.php?id=$row2[id_informasi]'> <div class='imgcontainer'>";
                  echo "<img id='img_div3' src='img/".$row2['gambar']."' alt='Snow' style='width:100%;'>";
                  echo "<div class='bottom-left'>".$row2['judul']."</div></div></a>";
                }
            ?>
          </div>
        </td>
      </tr>
    </table>-->

        <div style="padding: 100px 43px 43px 43px" class="container-fluid">
          <div>
            <?php echo "<div class='tag2'></div><div id='judul2'>".$row['judul']."</div>";
              echo "<div id='waktu2'>".$row['waktu']."</div>";
              echo "<center><img id='img_div2' src='img/".$row['gambar']."'></div></center>";
              echo "<br><br><div id='postingan'>".$row['isi_postingan']."</div>";
            ?> 
          </div>
        </div>

        <div style="padding: 35px 35px 35px 35px ; background-color: rgb(30,30,30);" class="container-fluid">
          <div class="tag"></div>
          <h4 style="margin: 0px 0px 40px 40px;color: white">INFORMASI TERBARU</h4>
          <div class="row">
          <?php
            $tampil2 = "SELECT * FROM informasi ORDER BY id_informasi DESC LIMIT 8";
            $hasil2 = mysqli_query($koneksi, $tampil2);
            while ($row2 = mysqli_fetch_array($hasil2)){
              echo "<div class='col-md-3'><a href='postingan.php?id=$row2[id_informasi]'>";
              echo "<div class='imgcontainer'>";
              echo "<img id='img_div3' src='img/".$row2['gambar']."' alt='Snow' style='width:100%;'>";
              echo "<div class='bottom-left'>".$row2['judul'];
              echo "</div></div></a></div>";
            }
          ?>
        </div>
      </div>

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