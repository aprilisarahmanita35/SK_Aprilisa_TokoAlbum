<?php

include "koneksi.php";

$id_kategori = $_POST['id_kategori'];
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$detail = $_POST['detail'];

// menampung data file yang diupload
$filename = $_FILES['foto']['name'];
$tmp_name = $_FILES['foto']['tmp_name'];

$typel = explode('.', $filename);
$type2 = $typel[1];

$newname = 'foto' . time() . '.' . $type2;

// menampung data format file yang diizinkan
$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

// validasi format file
if (!in_array($type2, $tipe_diizinkan)) {
	// jika format file tidak ada di dalam tipe diizinkan
	echo '<script>alert("Format file tidak diizinkan")</script>';
} else {
	// jika format file sesuai dengan yang ada di dalam array tipe diizinkan
	// proses upload file sekaligus insert ke database
	move_uploaded_file($tmp_name, './foto/' . $newname);

	$insert = mysqli_query($koneksi, "INSERT INTO produk VALUES (
        null,
        '" . $id_kategori . "',
        '" . $nama_produk . "',
        '" . $harga . "',
        '" . $stok . "',
        '" . $detail . "',
        '" . $newname . "'
    );");

	if ($insert) {
		echo 'Simpan data berhasil';
	} else {
		echo 'Gagal' . mysqli_error($koneksi);
	}
}

header("Location:index.php");
