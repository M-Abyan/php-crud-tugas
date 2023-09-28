<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$query = mysqli_query($connect, "SELECT * FROM tb_karyawan");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css" />
</head>

<body>
    <!-- <a href="logout.php">logout</a> -->

    <nav class="navbar bg-dark navbar-dark">
        <div class="container-fluid container">
            <span class="navbar-brand mb-0 h1">Navbar</span>
            <ul class="nav justify-content-end gap-3">
                <li class="nav-item">
                    <a class="nav-link active btn link-light btn-info rounded-pill badge" aria-current="page" href="index.php">Home</a>
                </li>
                <ul class="nav justify-content-end gap-3">
                    <li class="nav-item">
                        <a class="nav-link active btn link-light btn-danger rounded-pill badge" aria-current="page" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn link-light btn-success rounded-pill badge" aria-current="page" href="add.php">Add</a>
                    </li>
                </ul>
        </div>
    </nav>

    <div class="container text-center p-4">
        <h1>Daftar Karyawan</h1>
    </div>

    <div class="container d-flex align-items-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nik</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Divisi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php while ($result = mysqli_fetch_array($query)) : ?>
                    <tr>
                        <th><?= $no ?></th>
                        <th><?= $result["nik"] ?></th>
                        <th><?= $result["nama_karyawan"] ?></th>
                        <th><?= $result["jabatan"] ?></th>
                        <th><?= $result["tgl_masuk"] ?></th>
                        <th><?= $result["divisi"] ?></th>
                        <th>
                            <a class="btn btn-danger badge rounded-pill" href="delete.php?no=<?= $result["no"]; ?>">
                                Delete
                            </a>
                            <a class="btn btn-info badge rounded-pill" href="edit.php?no=<?= $result["no"]; ?>">
                                Edit
                            </a>
                        </th>
                    </tr>

                    <?php $no++ ?>

                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>