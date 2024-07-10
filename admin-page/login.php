<?php
session_start();

// Cek apakah pengguna sudah login, jika iya, arahkan ke halaman index.php
if(isset($_SESSION['id'])){
  header('Location: index.php');
  exit(); // Pastikan keluar setelah mengarahkan agar kode berhenti dieksekusi
}

require_once '../Database/database.php'; // Sesuaikan dengan path yang benar

// Cek apakah form login telah disubmit
if(isset($_POST['login'])){
  $mysqli = new Database();
  $user = $_POST['username'];
  $pass = $_POST['password'];

  // Panggil metode login dari objek Database untuk memeriksa kredensial pengguna
  $login = $mysqli->login($user, $pass);

  // Periksa apakah pengguna ada di database dan password yang dimasukkan sesuai
  if($login->num_rows > 0){
    // Jika berhasil, atur session untuk pengguna dan arahkan ke halaman index.php
    $_SESSION['id'] = $user;
    header('Location: index.php');
    exit(); // Pastikan keluar setelah mengarahkan agar kode berhenti dieksekusi
  }else{
    // Jika tidak berhasil, arahkan kembali ke halaman login.php
    header('Location: login.php');
    exit(); // Pastikan keluar setelah mengarahkan agar kode berhenti dieksekusi
  }
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smartfren GIS - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="Asset/css/style.css">
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <img src="../Asset/image/logo.png" alt="Smartfren" width="120" height="40"></a>
                    <h5 class="card-title text-center mb-4">Login</h5>
                    <form method="post" action="login.php" class="row g-3">
                        <div class="col-12">
                            <label for="inputUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="inputUsername" name="username" required>
                        </div>
                        <div class="col-12">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="password" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="login" class="btn btn-danger w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    