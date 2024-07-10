<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smartfren GIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Asset/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #ffffff;">
  <div class="container-fluid">
    <a class="navbar-brand" href="Beranda.php">
      <img src="../Asset/image/logo.png" alt="Smartfren" width="120" height="40">
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
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><b>Data Entry</b></a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Data-Leader.php">Data Leader</a></li>
            <li><a class="dropdown-item" href="Data-Artikel.php">Data Artikel</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Beranda.php"><b>Website</b></a>
        </li>
      </ul>
      <!-- Masukkan tombol login ke dalam navbar-collapse dan beri class ms-auto -->
      <ul class="navbar-nav ms-auto">
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><b>Admin</b></a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>

