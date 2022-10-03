<?php
include "../config.php";


?>

<?php
include "../layout/header.php";
?>
<title>Data Peminjaman</title>
</head>

<body class="sb-nav-fixed">
    <?php 
    include "../layout/navbar_petugas.php";
    ?>
    <div id="layoutSidenav">
        <?php
            include "../layout/sidebar_petugas.php";
            ?>
    </div>
    <div id="layoutSidenav_content" class="w-75" style="position: relative; left: 20%; margin-top: 100px;">
        <!-- a -->
        <div class="container tabel">
            <div class="card mt-5">
                <div class="card-header" style="background-color: #f7f7f7;">
                    <h4 class="mx-auto">History Peminjaman</h4>
                </div>
                <div class="card-body">
                    <!-- search -->
                    <div class="container">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- search -->
                    <table class="table table-hover table-bordered bordered-dark mt-4">
                        <thead>
                            <tr>
                                <th scope="col">ID Peminjaman</th>
                                <th scope="col">Siswa</th>
                                <th scope="col">Petugas</th>
                                <th scope="col">Tanggal Peminjaman</th>
                                <th scope="col">Tanggal Pengembalian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $ambil = mysqli_query($db, "SELECT * FROM peminjaman join siswa join petugas on peminjaman.id_siswa = siswa.nis and peminjaman.id_petugas = petugas.nip");
                                while ($data = mysqli_fetch_assoc($ambil)) {
                                ?>
                            <tr>
                                <td><?= $data['id_peminjaman'] ?></td>
                                <td><?= $data['nis'] ?>-<?= $data['namas'] ?></td>
                                <td><?= $data['nip'] ?>-<?= $data['nama'] ?></td>
                                <td><?= $data['tanggal_peminjaman'] ?></td>
                                <td><?= $data['tanggal_pengembalian'] ?></td>
                            </tr>
                </div>
                <?php
                                }
                                ?>
                </tbody>
                </table>
                <div class="text-center">
                    <a href="home_peminjaman.php" type="button" class="btn btn-danger"> Kembali </a>
                </div>
            </div>
        </div>

        <!-- a -->
        <script src="assets/bootstrap/js/bootstrap.bundle.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous">
        </script>
        <script src="../assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
        </script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous">
        </script>
        <script src="../assets/js/datatables-simple-demo.js"></script>
</body>

</html>