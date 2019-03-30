<?php 
//koneksi
include ('koneksi.php');

//Mengambil id dari list
$id = $_GET['id'];

//Perintah delete
$delete = "DELETE FROM user WHERE id = '$id'";

//Eksekusi Perintah
$hasil = mysqli_query($koneksi, $delete);

//cek hasil
if ($hasil) {
	header("location:anggota.php");
}else{
	echo "<h1 style='margin:200px'>ERROR</h1>";
}














 ?>