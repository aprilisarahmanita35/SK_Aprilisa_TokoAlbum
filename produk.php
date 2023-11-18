<?php

//koneksi ke database
include "koneksi.php";

// Default query to get all categories
$kategori = mysqli_query($koneksi, "SELECT * FROM kategori");

// Default query to get all products
$produk = mysqli_query($koneksi, "SELECT * FROM produk");

// Get products by name
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama LIKE '%$keyword%'");
}

// Get products by category
else if (isset($_GET['id_kategori'])) {
    $id_kategori = $_GET['id_kategori'];
    $queryGetKategoriId = mysqli_query($koneksi, "SELECT id_kategori FROM kategori WHERE jenis_kategori='$id_kategori'");
    $kategoriId = mysqli_fetch_array($queryGetKategoriId);
    $produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_kategori='$kategoriId[id_kategori]'");
}

// Get all products (default)
else {
    $produk = mysqli_query($koneksi, "SELECT * FROM produk");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Toko Album Kpop | Produk</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-warning logo h2 align-self-center" href="index.php">
                Toko Album KPOP
            </a>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produk.php">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Kategori</h1>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6 pb-4">
                        <div class="d-flex">
                            <select class="form-control" onchange="location = this.value;">
                                <option>Semua Produk</option>
                                <?php
                                while ($kategori_data = mysqli_fetch_array($kategori)) {
                                    $kategori_value = urlencode($kategori_data['jenis_kategori']);

                                ?>
                                <option value="produk.php?id_kategori=<?php echo $kategori_data['jenis_kategori']; ?>">
                                    <?php echo $kategori_data['jenis_kategori']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php
                    while ($produk_data = mysqli_fetch_array($produk)) { ?>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img src="admin/foto/<?php echo $produk_data['foto']; ?>" class="card-img-top" alt="">
                            </div>
                            <div class="card-body">
                                </a>
                                <a href="detail_produk.php?nama_produk=<?php echo $produk_data['nama_produk']; ?>"
                                    class="h3 text-decoration-none">
                                    <?php echo $produk_data['nama_produk']; ?>
                                </a>
                                <p class="text-left mb-0">Rp.
                                    <?php echo number_format($produk_data['harga']); ?>,-</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-warning border-bottom pb-3 border-light logo">Toko Album KPOP</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Palembang
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">aprilisa@company.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Kategori Produk</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="produk.php?id_kategori=Album NCT 127">Album NCT
                                127</a></li>
                        <li><a class="text-decoration-none" href="produk.php?id_kategori=Album NCT DREAM">Album NCT
                                DREAM</a></li>
                        <li><a class="text-decoration-none" href="produk.php?id_kategori=Album Aespa">Album Aespa</a>
                        </li>
                        <li><a class="text-decoration-none" href="produk.php?id_kategori=Album OH MY GIRL">Album OH MY
                                GIRL</a></li>
                        <li><a class="text-decoration-none" href="produk.php?id_kategori=Album NCT">Album NCT</a></li>
                        <li><a class="text-decoration-none" href="produk.php?id_kategori=Album BTS">Album BTS</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="index.php">Home</a></li>
                        <li><a class="text-decoration-none" href="about.php">About Us</a></li>
                        <li><a class="text-decoration-none" href="produk.php">Produk</a></li>
                        <li><a class="text-decoration-none" href="contact.php">Contact Us</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-center footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a rel="nofollow" class="text-light text-decoration-none" target="_blank"
                                href="http://fb.com/templatemo"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                                href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i
                                    class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank"
                                href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-center text-light">
                            Copyright &copy; 2023
                            | Designed by Aprilisa Rahmanita
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>