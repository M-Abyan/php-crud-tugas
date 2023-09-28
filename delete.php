<?php

include "koneksi.php";

mysqli_query($connect, "DELETE FROM tb_karyawan WHERE no='" . $_GET["no"] . "'");

header("Location: index.php");
