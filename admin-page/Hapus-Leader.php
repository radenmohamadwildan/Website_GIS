<?php
require_once "../Database/database.php";
require_once "../template/header.php";
require_once "../template/javascript.php";

// Inisialisasi objek Database
$db = new Database();

// Pesan kesalahan untuk validasi
$error = '';

// Jika ID tidak disertakan dalam URL, tampilkan pesan kesalahan
if (!isset($_GET['id'])) {
    $error = "ID tidak valid.";
} else {
    // Ambil ID dari URL
    $id = $_GET['id'];

    // Ambil data leader berdasarkan ID
    $leader = $db->getLeaderById($id);

    // Jika data leader tidak ditemukan, tampilkan pesan kesalahan
    if (!$leader) {
        $error = "Data leader tidak ditemukan.";
    }
}

// Jika terdapat kesalahan, tampilkan pesan kesalahan
if (!empty($error)) {
    echo "<div class='alert alert-danger'>" . $error . "</div>";
    exit(); // Hentikan eksekusi jika terdapat kesalahan
}

// Proses ketika tombol konfirmasi penghapusan ditekan
if (isset($_POST['confirm_delete'])) {
    $result = $db->hapusDataLeader($id);
    if ($result) {
        // Redirect ke halaman Data-Leader jika berhasil
        header("Location: Data-Leader.php");
        exit();
    } else {
        $error = "Maaf, terjadi kesalahan saat menghapus data leader.";
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
                <p class="card-text">Anda yakin ingin menghapus data leader berikut?</p>
                <ul class="list-group">
                    <li class="list-group-item">Nama: <?php echo $leader['nama']; ?></li>
                    <li class="list-group-item">Alamat: <?php echo $leader['alamat']; ?></li>
                    <li class="list-group-item">Media Sosial: <?php echo $leader['media_sosial']; ?></li>
                    <li class="list-group-item">Foto: <img src="../Asset/Foto_leader/<?php echo $leader['foto']; ?>" width="100"></li> <!-- Ubah path/to/images/ sesuai dengan path gambar -->
                    <li class="list-group-item">Kota: <?php echo $db->getNamaKota($leader['kota_id']); ?></li>
                </ul>
                <!-- Form untuk konfirmasi penghapusan -->
                <form action="" method="POST" class="mt-3">
                    <button type="submit" name="confirm_delete" class="btn btn-danger">Ya, Hapus</button>
                    <a href="Data-Leader.php" class="btn btn-secondary">Tidak, Batalkan</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
