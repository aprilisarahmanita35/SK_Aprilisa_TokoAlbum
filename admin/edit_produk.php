<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <title>Edit Data Produk</title>
</head>

<?php
include "koneksi.php";

// Ambil data produk berdasarkan id_produk
if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];
    $produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
    $produk_data = mysqli_fetch_assoc($produk);
} else {
    // Redirect ke halaman lain jika tidak ada id_produk
    header("Location: index.php");
    exit();
}
?>

<body>
    <div class="container">
        <div class="m-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h1 class="text-center">Edit Data Produk</h1>
            <form id="form_edit" action="proses_edit_produk.php" method="post" enctype="multipart/form-data">
                <!-- Menambahkan input hidden untuk menyimpan id_produk -->
                <input type="hidden" name="id_produk" value="<?php echo $produk_data['id_produk']; ?>">
                <div class="form-group mb-3">
                    <div class="form-label">ID Kategori</div>
                    <select name="id_kategori" class="required form-control">
                        <option value="">--Pilih--</option>
                        <?php
                        $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                        while ($kategori_data = mysqli_fetch_assoc($kategori)) {
                            // Menambahkan atribut 'selected' untuk opsi yang sesuai dengan data produk
                            $selected = ($kategori_data['id_kategori'] == $produk_data['id_kategori']) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $kategori_data['id_kategori']; ?>" <?php echo $selected; ?>>
                                <?php echo $kategori_data['id_kategori'] . ' - ' . $kategori_data['jenis_kategori']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Nama Produk</div>
                    <input type="text" name="nama_produk" data-name="Nama Produk" required="" class="required form-control" autocomplete="off" maxlength="50" value="<?php echo $produk_data['nama_produk']; ?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Harga</div>
                    <input type="number" name="harga" data-name="Harga" required="" class="required form-control" autocomplete="off" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $produk_data['harga']; ?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Stok</div>
                    <input type="text" name="stok" data-name="Stok" required="" class="required form-control" autocomplete="off" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $produk_data['stok']; ?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Detail</div>
                    <textarea name="detail" data-name="Detail" required="" class="required form-control" autocomplete="off" rows="10"><?php echo $produk_data['detail']; ?></textarea>
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Foto</div>
                    <!-- Menampilkan gambar produk yang sudah ada -->
                    <img src="foto/<?php echo $produk_data['foto']; ?>" alt="Foto Produk" style="max-width: 300px; max-height: 300px;">
                    <br>
                    <input type="file" name="foto" data-name="Foto" class="form-control">
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <a href="index.php" class="btn btn-danger btn-sm"><i class="bi bi-chevron-left"></i>Kembali</a>
                    <input type="submit" name="Submit" value="Edit Data" class="btn btn-warning btn-sm">
                </div>
            </form>
        </div>
    </div>
</body>

</html>