<?php

include "koneksi.php";

if (isset($_POST['id_produk'])) {
    $id_produk = $_POST['id_produk'];
    $id_kategori = $_POST['id_kategori'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $detail = $_POST['detail'];

    // menampung data file yang diupload
    $filename = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];

    // Cek apakah ada perubahan gambar
    if (!empty($filename)) {
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
            // proses upload file
            move_uploaded_file($tmp_name, './foto/' . $newname);

            // Update data termasuk nama file foto baru
            $update = mysqli_query($koneksi, "UPDATE produk SET
                id_kategori = '$id_kategori',
                nama_produk = '$nama_produk',
                harga = '$harga',
                stok = '$stok',
                detail = '$detail',
                foto = '$newname'
                WHERE id_produk = '$id_produk';");

            if ($update) {
                echo 'Edit data berhasil';
            } else {
                echo 'Gagal' . mysqli_error($koneksi);
            }
        }
    } else {
        // Jika tidak ada perubahan gambar
        $update = mysqli_query($koneksi, "UPDATE produk SET
            id_kategori = '$id_kategori',
            nama_produk = '$nama_produk',
            harga = '$harga',
            stok = '$stok',
            detail = '$detail'
            WHERE id_produk = '$id_produk';");

        if ($update) {
            echo 'Edit data berhasil';
        } else {
            echo 'Gagal' . mysqli_error($koneksi);
        }
    }
    header("Location:index.php");
}
