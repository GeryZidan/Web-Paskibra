<?php

include ('koneksi.php');

$id = $_GET['id'];
$nra = $_GET['nra'];
$nama = $_GET['nama'];
$satuan = $_GET['satuan'];
$angkatan = $_GET['angkatan'];
$kebidangan = $_GET['kebidangan'];
$email = $_GET['email'];
$password = $_GET['password'];

$update = "UPDATE user SET nra = '$nra', nama ='$nama', satuan = '$satuan', angkatan = '$angkatan', kebidangan = '$kebidangan', email = '$email', password = '$password' WHERE id ='$id'";

$hasil = mysqli_query($koneksi, $update);

if ($hasil) {
	header("location:anggota.php");
}else{
	echo "<h1 style='margin:200px'>ERROR</h1>";
}
?>