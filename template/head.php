<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smartfren GIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Asset/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #ffffff;">
  <div class="container-fluid">
    <a class="navbar-brand" href="Beranda.php">
      <img src="Asset/image/logo.png" alt="Smartfren" width="120" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="Beranda.php"><b>Beranda</b></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><b>Data Leader</b></a>
          <ul class="dropdown-menu dropdown-menu-scrollable" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="GIS.php">Peta Lokasi</a></li>
            <li><a class="dropdown-item" href="Agenda-Leader.php">Agenda Leader</a></li>
          </ul>
        </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><b>Agenda Kegiatan</b></a>
          <ul class="dropdown-menu dropdown-menu-scrollable" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="TKI.php">Teman Kreasi Indonesia</a></li>
            <li><a class="dropdown-item" href="TP.php">Teman Pintar</a></li>
            <li><a class="dropdown-item" href="BP.php">Bunda Pintar</a></li>
            <li><a class="dropdown-item" href="Kopdar.php">Kopdar</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Sejarah.php"><b>About Us</b></a>
        </li>
      </ul>
      <!-- Masukkan tombol login ke dalam navbar-collapse dan beri class ms-auto -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" target="_blank" href="admin-page"><img width="20" height="20" src="https://img.icons8.com/external-flat-icons-inmotus-design/67/external-login-messenger-flat-icons-inmotus-design.png" alt="external-login-messenger-flat-icons-inmotus-design"/>Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
