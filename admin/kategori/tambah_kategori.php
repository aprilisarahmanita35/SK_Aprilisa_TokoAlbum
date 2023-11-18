<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <title>Tambah Data Kategori</title>
</head>

<body>
    <div class="container">
        <div class="m-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h1 class="text-center">Tambah Data Kategori</h1>
            <form id="form_tambah" action="proses_tambah_kategori.php" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <div class="form-label">Jenis Kategori</div>
                    <input type="text" name="jenis_kategori" data-name="Jenis Kategori" required=""
                        class="required form-control" autocomplete="off" maxlength="50">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">ID Agency</div>
                    <select name="id_agency" class="required form-control">
                        <option value="">--Pilih--</option>
                        <?php
                        include "koneksi.php";
                        $agency = mysqli_query($koneksi, "SELECT * FROM agency");
                        while ($agency_data = mysqli_fetch_assoc($agency)) {
                        ?>
                        <option value="<?php echo $agency_data['id_agency']; ?>">
                            <?php echo $agency_data['id_agency'] . ' - ' . $agency_data['nama_agency']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <a href="kategori.php" class="btn btn-danger btn-sm"><i class="bi bi-chevron-left"></i>Kembali</a>
                    <input type="submit" name="Submit" value="Submit" class="btn btn-success btn-sm">
                </div>
            </form>
        </div>
    </div>
</body>

</html>