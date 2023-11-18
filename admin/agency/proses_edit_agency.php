<?php
include "koneksi.php";

if (isset($_POST['id_agency'])) {
	$id_agency = $_POST['id_agency'];
	$nama_agency = $_POST['nama_agency'];

	// Lakukan pembaruan data kategori ke database
	$update = mysqli_query($koneksi, "UPDATE agency SET
        nama_agency = '$nama_agency'
        WHERE id_agency = '$id_agency'
    ");

	if ($update) {
		echo 'Edit data berhasil';
	} else {
		echo 'Gagal: ' . mysqli_error($koneksi);
	}
	header("Location: agency.php");
}
