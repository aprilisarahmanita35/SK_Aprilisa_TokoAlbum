<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <title>Edit Data Kategori</title>
</head>
<?php
include "koneksi.php";

// Ambil data produk berdasarkan id_kategori
if (isset($_GET['id_kategori'])) {
    $id_kategori = $_GET['id_kategori'];
    $kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");
    $kategori_data = mysqli_fetch_assoc($kategori);
} else {
    // Redirect ke halaman lain jika tidak ada id_kategori
    header("Location: kategori.php");
    exit();
}
?>

<body>
    <div class="container">
        <div class="m-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h1 class="text-center">Edit Data Kategori</h1>
            <form id="form_edit" action="proses_edit_kategori.php" method="post" enctype="multipart/form-data">
                <!-- Menambahkan input hidden untuk menyimpan id_kategori -->
                <input type="hidden" name="id_kategori" value="<?php echo $kategori_data['id_kategori']; ?>">
                <div class="form-group mb-3">
                    <div class="form-label">Jenis Kategori</div>
                    <input type="text" name="jenis_kategori" data-name="Jenis Kategori" class="required form-control" autocomplete="off" maxlength="50" value="<?php echo $kategori_data['jenis_kategori']; ?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">ID Agency</div>
                    <select name="id_agency" class="required form-control">
                        <option value="">--Pilih--</option>
                        <?php
                        $agency = mysqli_query($koneksi, "SELECT * FROM agency");
                        while ($agency_data = mysqli_fetch_assoc($agency)) {
                            // Menambahkan atribut 'selected' untuk opsi yang sesuai dengan data produk
                            $selected = ($agency_data['id_agency'] == $kategori_data['id_agency']) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $agency_data['id_agency']; ?>" <?php echo $selected; ?>>
                                <?php echo $agency_data['id_agency'] . ' - ' . $agency_data['nama_agency']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <a href="kategori.php" class="btn btn-danger btn-sm"><i class="bi bi-chevron-left"></i>Kembali</a>
                    <input type="submit" name="Submit" value="Edit Data" class="btn btn-warning btn-sm">
                </div>
            </form>
        </div>
    </div>
</body>

</html>