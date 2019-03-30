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

	<div class="form-informasi-bg"></div>

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
          <form class="form-inline my-2 my-lg-0" action="search_i.php" method="post">
            <input name="key" class="form-control mr-sm-2" type="search" autofocus autocomplete="off" placeholder="Cari disini..." aria-label="Search">
            <button name="cari" class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>&emsp;&emsp;
          </form>
        </div>
      </nav>
    <!--/navbar-->
	
	<!--carousel-->
	<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active" data-interval="5000">
	      <img src="img/p2.jpg" class="d-block w-100 blur" alt="img/p2.jpg">
	    </div>
	    <div class="carousel-item" data-interval="5000">
	      <img src="img/p1.jpg" class="d-block w-100 blur" alt="img/p1.jpg">
	    </div>
	    <div class="carousel-item" data-interval="5000">
	      <img src="img/p3.jpg" class="d-block w-100 blur" alt="img/p3.jpg">
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	<div class="mytext hidden-xs">
        <div class="col-md-12 text-center">
            <span>INFORMASI </span> Terbaru <br> <span> PASKIBRA </span>kota <span> bandung </span>.
        </div>
    </div>
	<!--/carousel-->
	
	<!--isi-->
	<center><br><br><div id='judul'>INFORMASI TERBARU</div></center>
	<div class="isi">

		<?php
			include('koneksi.php');
			//setting halaman
			$batas = 6;
			$halaman = @$_GET['halaman'];

			if (empty($halaman)) {
				$posisi = 0;
				$halaman = 1;
			}else{
				$posisi = ($halaman-1) * $batas;
			}

			//hitung jumlah record untuk halaman
			$tampilres = mysqli_query($koneksi, "SELECT * FROM informasi ");
			$jumlahres = mysqli_num_rows($tampilres);

			//hitung jumlah halaman
			$jumlahhal = ceil($jumlahres /$batas);
			$tampil = "SELECT * FROM informasi ORDER BY id_informasi DESC LIMIT $posisi, $batas";


			$hasil = mysqli_query($koneksi, $tampil);
		    while ($row = mysqli_fetch_array($hasil)) {
			    echo "<div class='container-fluid'><div class='row'><div class='col-md-6'>";
			    echo "<a href='postingan.php?id=$row[id_informasi]'><img id='img_div' src='img/".$row['gambar']."'></a>";
			    echo "</div><div class='col-md-6'><br><br>";
			    echo "<a href='postingan.php?id=$row[id_informasi]' class='merah'><p id='judul'>".$row['judul']."</p></a>";
			    echo "<p id='waktu'>".$row['waktu']."</p>";
			    echo "<div id='postingan-limiter'>".$row['isi_postingan']."</div>...<br>";
			    echo "&emsp;&emsp;<a href='postingan.php?id=$row[id_informasi]''>";
			    echo "<button type='submit' class='btn btn-outline-dark'>Lanjut Baca</button></a>";
			    echo "</div></div></div>";
		    }

		    echo "<center><br><br>";
			$file = $_SERVER['PHP_SELF'];
			for ($i=1; $i <= $jumlahhal; $i++){
				if ($i == $halaman) {
					echo "<a href=\"$file?halaman=$i\" style='background:#ea2738 ;padding:15px;font-size:20px; text-decoration: none; font-weight: bold; color : white;'> $i </a>";
				}else{
					echo "<a href=\"$file?halaman=$i\" style='background:white ;padding:15px;font-size:20px; text-decoration: none; color : #ea2738;'> $i </a>";
				}
			};
			echo "</center>";
		?>
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