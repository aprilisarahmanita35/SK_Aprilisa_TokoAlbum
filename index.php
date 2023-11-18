<?php

include "koneksi.php";
$produk = mysqli_query($koneksi, "SELECT *, jenis_kategori,  nama_agency 
    FROM produk 
    JOIN kategori ON produk.id_kategori = kategori.id_kategori
    JOIN agency ON kategori.id_agency = agency.id_agency");

if (!$produk) {
    die("Query error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Toko Album Kpop | Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-warning logo h2 align-self-center" href="index.php">
                Toko Album KPOP
            </a>
            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
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
    </nav>
    <!-- Close Header -->

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <img class="img-fluid" src="./assets/img/kwangya.jpg">
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <img class="img-fluid" src="./assets/img/kwangya2.jpg">
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <img class="img-fluid" src="./assets/img/kwangya4.jpg">
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Kategori Produk</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="produk.php?id_kategori=Album NCT 127"><img src="./assets/img/nct127.jpeg" class="rounded img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Album NCT 127</h5>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="produk.php?id_kategori=Album NCT DREAM"><img src="./assets/img/nctdream.jpg" class="rounded img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Album NCT DREAM</h2>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="produk.php?id_kategori=Album Aespa"><img src="./assets/img/aespa.jpg" class="rounded img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Album Aespa</h2>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="produk.php?id_kategori=Album OH MY GIRL"><img src="./assets/img/ohmygirl.jpg" class="rounded img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Album OH MY GIRL</h5>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="produk.php?id_kategori=Album NCT"><img src="./assets/img/nct.jpeg" class="rounded img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Album NCT</h2>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="produk.php?id_kategori=Album BTS"><img src="./assets/img/bts.jpg" class="rounded img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Album BTS</h2>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Semua Produk</h1>
                </div>
            </div>
            <div class="row">
                <?php
                while ($produk_data = mysqli_fetch_array($produk)) { ?>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="detail_produk.php?nama_produk=<?php echo $produk_data['nama_produk']; ?>">
                                <img src="admin/foto/<?php echo $produk_data['foto']; ?>" class="card-img-top" alt="">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li class="text-muted text-right">Rp.
                                        <?php echo number_format($produk_data['harga']); ?>,-</li>
                                </ul>
                                <p class="card-text">
                                    Kategori: <strong><?php echo $produk_data['jenis_kategori']; ?></strong>
                                </p>
                                <p class="card-text">
                                    Agency: <strong><?php echo $produk_data['nama_agency']; ?></strong>
                                </p>
                                <a href="detail_produk.php?nama_produk=<?php echo $produk_data['nama_produk']; ?>" class="h2 text-decoration-none text-dark">
                                    <?php echo $produk_data['nama_produk']; ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

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
                            <a rel="nofollow" class="text-light text-decoration-none" target="_blank" href="http://fb.com/templatemo"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
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