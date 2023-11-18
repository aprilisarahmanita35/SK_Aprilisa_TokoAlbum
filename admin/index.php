<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN TOKO ALBUM KPOP</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofxP+Y8L5fLEuPvNf1cN7uP6EHAJ2zQ3S" crossorigin="anonymous">

    <!-- AdminLTE Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <!-- Custom CSS -->
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        background-color: #fff;
    }

    table,
    th,
    td {
        border: 1px solid #ccc;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ccc;
    }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="http://localhost/SK_Aprilisa_TokoAlbum/index.php" target="_blank"
                        class="nav-link">Website</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->


        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Menu Item -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <!-- Menu Item with Submenu -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Data Toko Album Kpop <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Produk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../admin/kategori/kategori.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Kategori</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../admin/agency/agency.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Agency</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Add more menu items as needed -->

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                <!-- Your content goes here -->
                <div class="container-fluid">
                    <h1 class="text-center">Data Produk</h1>
                    <a href="tambah_produk.php" class="btn btn-success btn-sm mb-3">+ Tambah Data Produk</a>
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr class="text-center align-middle">
                                <th class="text-center" scope="col">No. </th>
                                <th class="text-center" scope="col">ID Kategori</th>
                                <th class="text-center" scope="col">ID Produk</th>
                                <th class="text-center" scope="col">Nama Produk</th>
                                <th class="text-center" scope="col" width="80px">Harga</th>
                                <th class="text-center" scope="col">Stok</th>
                                <th class="text-center" scope="col">Detail</th>
                                <th class="text-center" scope="col">Foto</th>
                                <th class="text-center" scope="col" width="120px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "koneksi.php";
                            $no = 1;
                            $produk = mysqli_query($koneksi, "SELECT * FROM produk");
                            if (mysqli_num_rows($produk) > 0) {
                                while ($produk_data = mysqli_fetch_array($produk)) {
                            ?>
                            <tr>
                                <th class="text-center align-middle"><?php echo $no ?></th>
                                <td class="text-center align-middle"><?php echo $produk_data["id_produk"] ?></td>
                                <td class="text-center align-middle"><?php echo $produk_data["id_kategori"] ?></td>
                                <td class="text-center align-middle"><?php echo $produk_data["nama_produk"] ?></td>
                                <td class="text-center align-middle">
                                    <?php echo "Rp " . number_format($produk_data["harga"]) ?></td>
                                <td class="text-center align-middle"><?php echo number_format($produk_data["stok"]) ?>
                                </td>
                                <td class="text-center align-middle"><?php echo $produk_data["detail"] ?></td>
                                <td class="text-center align-middle"><img src="foto/<?php echo $produk_data["foto"] ?>"
                                        width="100px"></td>
                                <td>
                                    <a href="edit_produk.php?id_produk=<?php echo $produk_data['id_produk']; ?>"
                                        class="btn btn-warning">Edit</a>
                                    <a href="delete_produk.php?id_produk=<?php echo $produk_data['id_produk']; ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Delete</a>
                                </td>
                            </tr>
                            <?php $no++;
                                }; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>

    <!-- Your custom scripts go here -->

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</body>

</html>