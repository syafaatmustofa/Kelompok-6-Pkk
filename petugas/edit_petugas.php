<?php
include '../config.php';

if (isset($_POST['submit'])) {
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  if ($password !== $cpassword) {
    echo "<script>alert('Password harus sama')</script>";
  } else {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];

    $query = mysqli_query($db, "UPDATE petugas SET nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', password='$password' WHERE nip='$nip'");

    if ($query) {
      header("location:home_petugas.php");
    }
  }
}
?>

<?php
include "../layout/header.php";
?>
<title>Data Buku</title>
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
    <div id="layoutSidenav_content" class="w-75 h-100" style="position: relative; left: 20%; margin-top: 100px;">
        <div class="container-fluid py-4">

            <!-- <div class="posts-list">data</div> -->
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="form-wrapper">
                        <div class="judul text-center my-4">
                            <h3>Edit Data Petugas</h3>
                        </div>
                        <!-- start form -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php
              $id = $_GET['nip'];
              $ambil = mysqli_query($db, "SELECT * FROM petugas WHERE nip='$id'");
              while ($data = mysqli_fetch_assoc($ambil)) {

              ?>
                            <div class="input-1 w-50 mx-auto">
                                <div class="mb-3">
                                    <label class="form-label">NIP</label>
                                    <input type="text" class="form-control" readonly name="nip"
                                        value="<?= $data['nip'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Petugas</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis kelamin sebelumnya : </label>
                                    <?php
                    if ($data['jenis_kelamin'] == "P") {
                      echo "<span><h6>Perempuan</h6></span>";
                    } else {
                      echo "<span><h6>Laki-laki</h6></span>";
                    }
                    ?>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pilih Jenis Kelamin</label>
                                    <select class="form-select" required name="jenis_kelamin">
                                        <option disabled selected value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat"
                                        value="<?= $data['alamat'] ?>">
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                        onclick="lihat()">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Lihat password</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                            </div>
                            <?php
              }
              ?>
                        </form>
                        <!-- end form -->
                    </div>
                    <!-- <div class="table-responsive p-0"></div> -->
                </div>
            </div>
        </div>
        <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
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

        <script>
        function lihat() {
            let x = document.getElementById("password");
            let y = document.getElementById("cpassword");
            if (x.type == "password" && y.type == "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }

        function check() {
            if (document.getElementById('password').value == document.getElementById('cpassword').value) {
                document.getElementById('cek_password').style.color = 'green';
                document.getElementById('cek_password').innerHTML = 'Password sama';
            } else {
                document.getElementById('cek_password').style.color = 'red';
                document.getElementById('cek_password').innerHTML = 'Password tidak sama';
            }
        }
        </script>

</body>

</html>