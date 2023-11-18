<?php

include "koneksi.php";

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    // Ambil nama file foto terlebih dahulu
    $query_select = mysqli_query($koneksi, "SELECT foto FROM produk WHERE id_produk = '$id_produk'");
    $data_produk = mysqli_fetch_assoc($query_select);
    $foto_produk = $data_produk['foto'];

    // Hapus data dari database
    $delete = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk = '$id_produk'");

    if ($delete) {
        // Jika data berhasil dihapus, hapus juga file foto dari direktori
        if (!empty($foto_produk) && file_exists('./foto/' . $foto_produk)) {
            unlink('./foto/' . $foto_produk);
        }
        echo 'Hapus data berhasil';
    } else {
        echo 'Gagal menghapus data' . mysqli_error($koneksi);
    }
} else {
    echo 'ID Produk tidak valid';
}

header("Location:index.php");
