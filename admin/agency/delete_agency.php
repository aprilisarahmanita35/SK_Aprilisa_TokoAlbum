<?php
include "koneksi.php";

if (isset($_GET['id_agency'])) {
    $id_agency = $_GET['id_agency'];

    // Hapus data dari database
    $delete = mysqli_query($koneksi, "DELETE FROM agency WHERE id_agency = '$id_agency'");

    header("Location:agency.php");
}
