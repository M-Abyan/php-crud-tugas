<?php

session_start();
include 'koneksi.php';

$no = $_GET['no'];

$result = mysqli_query($connect, "SELECT * FROM tb_karyawan WHERE no = $no");
$row = mysqli_fetch_assoc($result);
$nik = $row['nik'];
$nama_karyawan = $row['nama_karyawan'];
$jabatan = $row['jabatan'];
$tanggl_masuk = $row['tgl_masuk'];
$divisi = $row['divisi'];

if (isset($_POST['update'])) {
    $no = $_POST['no'];
    $nik = $_POST['nik'];
    $nama_karyawan = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $divisi = $_POST['divisi'];

    $query_update = "UPDATE tb_karyawan SET 
    nik='$nik',
    nama_karyawan = '$nama_karyawan',
    jabatan = '$jabatan',
    tgl_masuk = '$tgl_masuk',
    divisi = '$divisi'
    WHERE no = '$no'
    ";

    mysqli_query($connect, $query_update);

    header("Location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css" />
</head>

<body>
    <nav class="navbar bg-dark navbar-dark">
        <div class="container-fluid container">
            <span class="navbar-brand mb-0 h1">Navbar</span>
            <ul class="nav justify-content-end gap-3">
                <li class="nav-item">
                    <a class="nav-link active btn link-light btn-info rounded-pill badge" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active btn link-light btn-danger rounded-pill badge" aria-current="page" href="logout.php">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active btn link-light btn-success rounded-pill badge" aria-current="page" href="add.php">Add</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active btn link-light btn-success rounded-pill badge" aria-current="page" href="add.php"></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container p-4 col-4 gap-5">
        <form class="" action="" method="POST">
            <div class="mb-3">
                <input type="hidden" class="form-control" id="nik" aria-describedby="emailHelp" name="no" value="<?= $no ?>" />
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">Nik</label>
                <input class="form-control" id="nik" aria-describedby="emailHelp" name="nik" value="<?= $nik ?>" />
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input class="form-control" id="nama" aria-describedby="emailHelp" name="nama" value="<?= $nama_karyawan ?>" />
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input class="form-control" id="jabatan" aria-describedby="emailHelp" name="jabatan" value="<?= $jabatan ?>" />
            </div>
            <div class="mb-3">
                <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tgl_masuk" aria-describedby="emailHelp" name="tgl_masuk" value="<?= $tanggl_masuk ?>" />
            </div>
            <div class="mb-3">
                <label for="divisi" class="form-label">Divisi</label>
                <input type="divisi" class="form-control" id="divisi" name="divisi" value="<?= $divisi ?>" />
            </div>
            <button type="submit" class="btn btn-dark col-12 mx-auto align-self-center" name="update">
                Update
            </button>
        </form>
    </div>
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>