<?php
include "koneksi.php";

$nama_agency = $_POST['nama_agency'];

$insert = mysqli_query($koneksi, "INSERT INTO agency (nama_agency) VALUES (
    '" . $nama_agency . "'
);");

if ($insert) {
    echo 'Simpan data berhasil';
} else {
    echo 'Gagal: ' . mysqli_error($koneksi);
}

header("Location:agency.php");
