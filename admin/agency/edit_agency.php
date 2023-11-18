<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <title>Edit Data Agency</title>
</head>
<?php
include "koneksi.php";

// Ambil data produk berdasarkan id_agency
if (isset($_GET['id_agency'])) {
    $id_agency = $_GET['id_agency'];
    $agency = mysqli_query($koneksi, "SELECT * FROM agency WHERE id_agency = '$id_agency'");
    $agency_data = mysqli_fetch_assoc($agency);
} else {
    // Redirect ke halaman lain jika tidak ada id_agency
    header("Location: agency.php");
    exit();
}
?>

<body>
    <div class="container">
        <div class="m-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h1 class="text-center">Edit Data Agency</h1>
            <form id="form_edit" action="proses_edit_agency.php" method="post" enctype="multipart/form-data">
                <!-- Menambahkan input hidden untuk menyimpan id_agency -->
                <input type="hidden" name="id_agency" value="<?php echo $agency_data['id_agency']; ?>">
                <div class="form-group mb-3">
                    <div class="form-label">Nama Agency</div>
                    <input type="text" name="nama_agency" data-name="Nama Agency" class="required form-control" autocomplete="off" maxlength="50" value="<?php echo $agency_data['nama_agency']; ?>">
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <a href="agency.php" class="btn btn-danger btn-sm"><i class="bi bi-chevron-left"></i>Kembali</a>
                    <input type="submit" name="Submit" value="Edit Data" class="btn btn-warning btn-sm">
                </div>
            </form>
        </div>
    </div>
</body>

</html>