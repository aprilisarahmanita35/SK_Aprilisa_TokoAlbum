<?php
include "koneksi.php";

if (isset($_GET['id_kategori'])) {
    $id_kategori = $_GET['id_kategori'];

    // Hapus data dari database
    $delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$id_kategori'");

    header("Location:kategori.php");
}
