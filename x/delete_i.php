<?php 
//koneksi
include ('koneksi.php');

//Mengambil id dari list
$id = $_GET['id'];

//Perintah delete
$delete = "DELETE FROM informasi WHERE id_informasi = '$id'";

//Eksekusi Perintah
$hasil = mysqli_query($koneksi, $delete);

//cek hasil
if ($hasil) {
	header("location:informasi_atur.php");
}else{
	echo "<h1 style='margin:200px'>ERROR</h1>";
}














 ?>