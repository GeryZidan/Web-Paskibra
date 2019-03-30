<?php 
  session_start();
  if(!isset($_SESSION["u_email"])){
    header("location:login.php");
  }

  if ($_SESSION['u_level'] == 'tamu') {
    header("location:index.php");
    }else{
?>

<!doctype html>
<html lang="en">
<html>
<head>
  <title>Anggota | Paskib Bandung</title>
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
  <div class="isi3">
      <center><div id="judul">DAFTAR ANGGOTA</div>
      <br>* ID, Password, Level dan Opsi hanya bisa dilihat oleh admin<br><br>
      <?php 
      //koneksi
      include ('koneksi.php');

      //perintah menampilkan data
      $tampil = "SELECT * FROM user";

      //eksekusi perintah
      $hasil = mysqli_query($koneksi, $tampil);

      if ($_SESSION['u_level'] == 'admin') {
        echo "<a href='input_anggota.php'><button type='submit' class='btn btn-danger'>TAMBAH ANGGOTA</button></center></a><br>";
        echo "<table id='table-field' border='1' width='100%' align='center'>
              <tr>
                <td id='n' width='5%'>ID</td>
                <td id='n' width='5%'>NRA</td>
                <td id='n' width='30%'>Nama</td>
                <td id='n' width='6%'>Satuan</td>
                <td id='n' width='6%'>Angkatan</td>
                <td id='n' width='6%'>Kebidangan</td>
                <td id='n' width='12.5%'>Email</td>
                <td id='n' width='12.5%'>Password</td>
                <td id='n' width='5%'>Level</td>
                <td id='n' width='10%' rowspan='2'>Opsi</td>
              </tr>
            </table>";
            //memisahkan data
            while ($data = mysqli_fetch_array($hasil)) {

              echo "<table id='table-record' border='1' align='center' width='100%'>";
              echo "<tr><td width='5%'>",$data['id'],"</td>";
              echo "<td width='5%'>",$data['nra'],"</td>";
              echo "<td width='30%'>",$data['nama'],"</td>";
              echo "<td width='6%'>",$data['satuan'],"</td>";
              echo "<td width='6%'>",$data['angkatan'],"</td>";
              echo "<td width='6%'>",$data['kebidangan'],"</td>";
              echo "<td width='12.5%'>",$data['email'],"</td>";
              echo "<td width='12.5%'>",$data['password'],"</td>";
              echo "<td width='5%'>",$data['level'],"</td>";
              echo "<td width='5%'>","<a href=\"update_a.php?id=$data[id]\">Edit </a>","</td>";
              echo "<td width='5%'>","<a href=\"delete_a.php?id=$data[id]\">Delete</a></td></tr></table>";
            }  
            }else{
              echo "<table id='table-field' border='1' width='90%' align='center'>
                    <tr>
                      <td id='n' width='5%'>NRA</td>
                      <td id='n' width='30%'>Nama</td>
                      <td id='n' width='6%'>Satuan</td>
                      <td id='n' width='6%'>Angkatan</td>
                      <td id='n' width='6%'>Kebidangan</td>
                      <td id='n' width='12.5%'>Email</td>
                    </tr>
                  </table>";
                  //memisahkan data
                  while ($data = mysqli_fetch_array($hasil)) {

                    echo "<table id='table-record' border='1' align='center' width='90%'>";
                    echo "<tr><td width='5%'>",$data['nra'],"</td>";
                    echo "<td width='30%'>",$data['nama'],"</td>";
                    echo "<td width='6%'>",$data['satuan'],"</td>";
                    echo "<td width='6%'>",$data['angkatan'],"</td>";
                    echo "<td width='6%'>",$data['kebidangan'],"</td>";
                    echo "<td width='12.5%'>",$data['email'],"</td></tr></table>";
                  }
            }
      ?>
  </div>
  <!--/isi-->

  <!--footer-->
  <footer class="page-footer font-small blue pt-4"">
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
} 
?>
