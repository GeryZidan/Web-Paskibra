<?php 

include ('koneksi.php');

$nra = $_GET['nra'];
$nama = $_GET['nama'];
$satuan = $_GET['satuan'];
$angkatan = $_GET['angkatan'];
$kebidangan = $_GET['kebidangan'];
$email = $_GET['email'];
$password = $_GET['password'];
$level = "user";

$input = "INSERT INTO user(nra, nama, satuan, angkatan, kebidangan, email, password, level) VALUES ('$nra', '$nama', '$satuan','$angkatan', '$kebidangan', '$email', '$password', '$level')";


$hasil = mysqli_query($koneksi, $input);

if ($hasil) {
	header("location:anggota.php");
}else{
	echo "<h1 style='margin:200px'>ERROR</h1>";
}

 ?>