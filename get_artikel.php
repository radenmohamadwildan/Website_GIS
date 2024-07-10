<?php
require_once "template/javascript.php";
require_once "Database/database.php";

// Inisialisasi objek Database
$db = new Database();

// Ambil kota_id yang dipilih
$selected_kota_id = isset($_GET['kota_id']) ? intval($_GET['kota_id']) : 0;

// Ambil data kota yang dipilih
$query_kota = "SELECT * FROM kota WHERE id = $selected_kota_id";
$result_kota = $db->mysqli->query($query_kota);
$kota = $result_kota->fetch_assoc();

// Ambil data artikel berdasarkan kota_id yang dipilih
$query = "SELECT * FROM data_artikel WHERE kota_id = $selected_kota_id";
$result = $db->mysqli->query($query);
?>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        color: #333;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
        font-size: 28px;
        margin-bottom: 20px;
        text-align: center;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
    }

    .article-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .article-item {
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fafafa;
        transition: box-shadow 0.3s ease;
    }

    .article-item:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .article-details {
        flex: 1;
    }

    .article-details h3 {
        font-size: 24px;
        margin: 0 0 10px;
        color: #d81b60;
    }

    .article-details p {
        margin: 10px 0;
        font-size: 16px;
        line-height: 1.6;
    }

    .article-details p strong {
        font-weight: 600;
    }

    .article-photo {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }

    .article-photo img {
        border-radius: 8px;
        max-width: 100%;
        height: auto;
        object-fit: cover;
    }

    .back-button {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .back-button a {
        padding: 10px 20px;
        background-color: #d81b60;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .back-button a:hover {
        background-color: #a31545;
        color: white;
    }

}
</style>

<div class="container mt-5">
    <h2>Artikel di Kota <?= htmlspecialchars($kota['nama_kota'], ENT_QUOTES, 'UTF-8') ?></h2>
    <div class="article-list">
        <?php
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="article-item">
                <div class="article-details">
                    <h3><?= ucfirst(strtolower(htmlspecialchars($row['judul_artikel'], ENT_QUOTES, 'UTF-8'))) ?></h3>
                    <p><strong>Isi Artikel:</strong> <?= nl2br(htmlspecialchars($row['isi_artikel'], ENT_QUOTES, 'UTF-8')) ?></p>
                    <p><strong>Tanggal Publish:</strong> <?= htmlspecialchars($row['tanggal_publish'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p><strong>Penanggung Jawab:</strong> <?= htmlspecialchars($row['penanggung_jawab'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <div class="article-photo">
                    <img src='Asset/Foto_artikel/<?= htmlspecialchars($row['file_foto'], ENT_QUOTES, 'UTF-8') ?>' alt="<?= htmlspecialchars($row['judul_artikel'], ENT_QUOTES, 'UTF-8') ?> Photo">
                </div>
            </div>
            <?php
            $no++;
        }
        ?>
    </div>
    <div class="back-button">
        <a href="Agenda-Leader.php">Kembali ke Agenda Leader</a>
    </div>
</div>
