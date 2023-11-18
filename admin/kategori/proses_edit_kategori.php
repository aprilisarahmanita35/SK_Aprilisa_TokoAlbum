<?php
include "koneksi.php";

if (isset($_POST['id_kategori'])) {
	$id_kategori = $_POST['id_kategori'];
	$jenis_kategori = $_POST['jenis_kategori'];
	$id_agency = $_POST['id_agency'];

	// Lakukan pembaruan data kategori ke database
	$update = mysqli_query($koneksi, "UPDATE kategori SET
        jenis_kategori = '$jenis_kategori',
        id_agency = '$id_agency'
        WHERE id_kategori = '$id_kategori'
    ");

	if ($update) {
		echo 'Edit data berhasil';
	} else {
		echo 'Gagal: ' . mysqli_error($koneksi);
	}
	header("Location: kategori.php");
}
