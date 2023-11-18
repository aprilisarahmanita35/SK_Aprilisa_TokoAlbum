<?php
include "koneksi.php";

$jenis_kategori = $_POST['jenis_kategori'];
$id_agency = $_POST['id_agency'];

$insert = mysqli_query($koneksi, "INSERT INTO kategori (jenis_kategori, id_agency) VALUES (
    '" . $jenis_kategori . "',
    '" . $id_agency . "'
);");

if ($insert) {
    echo 'Simpan data berhasil';
} else {
    echo 'Gagal: ' . mysqli_error($koneksi);
}

header("Location:kategori.php");
