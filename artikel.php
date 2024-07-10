<?php
require_once 'template/head.php';
require_once 'template/javascript.php';
require_once 'Database/database.php'; // Sesuaikan dengan lokasi file Database.php

// Ambil ID artikel dari URL
$articleId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Inisialisasi database
$db = new Database();
$article = $db->getArtikelById($articleId); // Ambil artikel berdasarkan ID

if (!$article) {
    echo "<div class='container mt-5'><h1>Artikel tidak ditemukan</h1></div>";
    exit;
}
?>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <article class="bg-light p-5 rounded shadow-sm">
                <h1 class="text-danger font-weight-bold mb-3"><?php echo $article['judul_artikel']; ?></h1>
                <p class="text-muted mb-1"><small>Dipublikasikan pada: <?php echo date('d M Y', strtotime($article['tanggal_publish'])); ?></small></p>
                <p class="text-muted mb-4"><small>Penanggung Jawab: <?php echo $article['penanggung_jawab']; ?></small></p>
                <div class="text-center mb-4">
                    <img src="Asset/Foto_Artikel/<?php echo $article['file_foto']; ?>" class="img-fluid rounded" alt="<?php echo $article['judul_artikel']; ?>" style="max-height: 500px; object-fit: cover;">
                </div>
                <div class="article-content mb-4">
                    <p><?php echo nl2br($article['isi_artikel']); ?></p>
                </div>
                <div class="text-center">
                    <a href="index.php" class="btn btn-custom">Kembali ke Beranda</a>
                </div>
            </article>
        </div>
    </div>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }
    .btn-custom {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn-custom:hover {
        background-color: #c82333;
        transform: scale(1.05);
    }
    .article-content p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
        margin-bottom: 1.5rem;
    }
    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
    }
    article {
        background: #fff;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    h1 {
        font-size: 2rem;
        line-height: 1.2;
    }
    .text-muted small {
        display: block;
        margin-bottom: 0.5rem;
    }
</style>

<?php
require_once 'template/footer.php';
?>
