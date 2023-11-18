<?php
//koneksi ke database
include "koneksi.php";

$nama_produk = htmlspecialchars($_GET['nama_produk']);

// Query pertama
$query_produk = "SELECT *, jenis_kategori, nama_agency
                 FROM produk 
                 JOIN kategori ON produk.id_kategori = kategori.id_kategori
                 JOIN agency ON kategori.id_agency = agency.id_agency
                 WHERE nama_produk = ?";

$statement_produk = mysqli_prepare($koneksi, $query_produk);
mysqli_stmt_bind_param($statement_produk, 's', $nama_produk);
mysqli_stmt_execute($statement_produk);

$produk = mysqli_stmt_get_result($statement_produk);

if (!$produk) {
    die("Query error: " . mysqli_error($koneksi));
}

$produk_data = mysqli_fetch_array($produk);

// Query kedua
$query_produk_terkait = "SELECT * FROM produk 
                         WHERE id_kategori = ? 
                         AND id_produk != ?";

$statement_produk_terkait = mysqli_prepare($koneksi, $query_produk_terkait);
mysqli_stmt_bind_param($statement_produk_terkait, 'ii', $produk_data['id_kategori'], $produk_data['id_produk']);
mysqli_stmt_execute($statement_produk_terkait);

$queryprodukterkait = mysqli_stmt_get_result($statement_produk_terkait);

if (!$queryprodukterkait) {
    die("Query error: " . mysqli_error($koneksi));
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Toko Album Kpop | Detail Produk</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
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
    </nav>
    <!-- Close Header -->

    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img src="admin/foto/<?php echo $produk_data['foto']; ?>" alt="Card image cap"
                            id="product-detail">
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><?php echo $produk_data['nama_produk']; ?></h1>
                            <p class="h3 py-2">Rp.
                                <?php echo number_format($produk_data['harga']); ?>,-</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Kategori:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted">
                                        <strong><?php echo $produk_data['jenis_kategori']; ?></strong>
                                    </p>
                                </li>
                            </ul>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Agency:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted">
                                        <strong><?php echo $produk_data['nama_agency']; ?></strong>
                                    </p>
                                </li>
                            </ul>
                            <h6>Detail:</h6>
                            <p><?php echo $produk_data['detail']; ?></p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Stok :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong><?php echo $produk_data['stok']; ?></strong></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Produk Terkait</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">
                <?php
                while ($produk_data = mysqli_fetch_array($queryprodukterkait)) { ?>
                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid"
                                src="admin/foto/<?php echo $produk_data['foto']; ?>">
                        </div>
                        <div class="card-body">
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
    </section>
    <!-- End Article -->


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

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
    $('#carousel-related-product').slick({
        infinite: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 3,
        dots: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            }
        ]
    });
    </script>
    <!-- End Slider Script -->

</body>

</html>