<?php
require_once "../Database/database.php";
require_once "../template/header.php";
require_once "../template/javascript.php";

// Initialize Database object
$db = new Database();

// Error message for validation
$error = '';

// If ID is not included in the URL, display an error message
if (!isset($_GET['id'])) {
    $error = "ID tidak valid.";
} else {
    // Get ID from URL
    $id = $_GET['id'];

    // Fetch article data by ID
    $artikel = $db->getArtikelById($id);

    // If article data is not found, display an error message
    if (!$artikel) {
        $error = "Data artikel tidak ditemukan.";
    } else {
        // Fetch city name based on city ID
        $kota = $db->getKotaById($artikel['kota_id']);
    }
}

// If there's an error, display the error message
if (!empty($error)) {
    echo "<div class='alert alert-danger'>" . $error . "</div>";
    exit(); // Stop execution if there's an error
}

// Process when the delete confirmation button is pressed
if (isset($_POST['confirm_delete'])) {
    $result = $db->hapusDataArtikel($id);
    if ($result) {
        // Redirect to Data-Artikel page if successful
        header("Location: Data-Artikel.php");
        exit();
    } else {
        $error = "Maaf, terjadi kesalahan saat menghapus data artikel.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Penghapusan</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <h5 class="card-header">Konfirmasi Penghapusan</h5>
            <div class="card-body">
                <p class="card-text">Anda yakin ingin menghapus data artikel berikut?</p>
                <ul class="list-group">
                    <li class="list-group-item">Judul Artikel: <?php echo htmlspecialchars($artikel['judul_artikel']); ?></li>
                    <li class="list-group-item">Isi Artikel: <?php echo htmlspecialchars($artikel['isi_artikel']); ?></li>
                    <li class="list-group-item">Tanggal Publish: <?php echo htmlspecialchars($artikel['tanggal_publish']); ?></li>
                    <li class="list-group-item">Penanggung Jawab: <?php echo htmlspecialchars($artikel['penanggung_jawab']); ?></li>
                    <li class="list-group-item">Kota: <?php echo htmlspecialchars($kota['nama_kota']); ?></li>
                    <li class="list-group-item">Foto: <img src="../Asset/Foto_artikel/<?php echo htmlspecialchars($artikel['file_foto']); ?>" width="100"></li>
                </ul>
                <!-- Form for deletion confirmation -->
                <form action="" method="POST" class="mt-3">
                    <button type="submit" name="confirm_delete" class="btn btn-danger">Ya, Hapus</button>
                    <a href="Data-Artikel.php" class="btn btn-secondary">Tidak, Batalkan</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
