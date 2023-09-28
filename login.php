<?php

session_start();
include 'koneksi.php';

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $data = mysqli_query($connect, "SELECT * FROM tb_pengguna WHERE username = '$username' AND password='$password'");

  if (mysqli_num_rows($data) === 1) {
    $row = mysqli_fetch_assoc($data);
    if ($password = $row['password']) {

      $_SESSION["login"] = true;

      header("Location: index.php");
      exit;
    }
  }
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
  <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center gap-5">
    <h1 class="">LOGIN</h1>
    <form class="" action="" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input class="form-control" id="username" aria-describedby="emailHelp" name="username" />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" />
      </div>
      <button type="submit" class="btn btn-dark col-12 mx-auto align-self-center" name="login">
        Submit
      </button>
    </form>
  </div>
  <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>