<!doctype html>
<html lang="en">
<html>
<head>
  <title>Login | Paskib Bandung</title>
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
          </ul>
        </div>
      </nav>
    <!--/navbar-->
  
  <!--isi-->
  <div class="row">
      <div style="background: url(img/p2.jpg);" class="col-md-8"></div>
      <div style="padding: 140px 45px 180px 45px; " class="col-md-4">
        <div class="tag"></div><h5 style="margin-left: 22px">SELAMAT DATANG, <span>SILAHKAN LOGIN</span></h5><br><br>
        <form method="post" action="">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">EMAIL</label>
            <input name="email" rows="1" class="form-control" id="exampleFormControlTextarea1" placeholder="Tulis email disini..."><br><br>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">PASSWORD</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Tulis password disini...">
          </div>
          <center><button type="submit" name="submit" class="btn btn-outline-danger">LOGIN</button><br>
          <br>
        </form>
        <div style="color: rgb(30,30,30);">
        <?php
          error_reporting(0);
          if(isset($_POST["submit2"])){
            session_start();
              $_SESSION['u_email']= 'none';
              $_SESSION['u_nra']= 'none';
              $_SESSION['u_nama']= 'tamu';
              $_SESSION['u_satuan']= 'none';
              $_SESSION['u_angkatan']= 'none';
              $_SESSION['u_kebidangan']= 'none';
              $_SESSION['u_level']= 'none';

              /* Redirect browser */
              header("Location: index.php");
          }
          if(isset($_POST["submit"])){

          if(!empty($_POST['email']) && !empty($_POST['password'])) {
            $email=$_POST['email'];
            $password=$_POST['password'];

            include ('koneksi.php');

            $query=mysqli_query($koneksi, "SELECT * FROM user WHERE email='".$email."' AND password='".$password."'");
            
            $numrows=mysqli_num_rows($query);
              if($numrows!=0){
                while($row=mysqli_fetch_assoc($query)){
                  $dbemail=$row['email'];
                  $dbpassword=$row['password'];
                }
              }else {
              echo "Password & Email tidak cocok !";
            }

              if($email == $dbemail && $password == $dbpassword){
              $tampil = "SELECT * FROM user WHERE email='".$email."'";
              $hasil = mysqli_query($koneksi, $tampil);
              $data = mysqli_fetch_array($hasil);
              session_start();
              $_SESSION['u_email']= $data['email'];
              $_SESSION['u_nra']= $data['nra'];
              $_SESSION['u_nama']= $data['nama'];
              $_SESSION['u_satuan']= $data['satuan'];
              $_SESSION['u_angkatan']= $data['angkatan'];
              $_SESSION['u_kebidangan']= $data['kebidangan'];
              $_SESSION['u_level']= $data['level'];

              /* Redirect browser */
              header("Location: index.php");
            }
            } else {
            echo "Jangan di kosongkan !";
            }
          }
          ?>
          <br><br><button type="submit" name="submit2" class="btn btn-dark">MASUK SEBAGAI TAMU</button></center>
          </div></center>
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