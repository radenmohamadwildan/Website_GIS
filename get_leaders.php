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

// Ambil data leader berdasarkan kota_id yang dipilih
$query = "SELECT * FROM data_leader WHERE kota_id = $selected_kota_id";
$result = $db->mysqli->query($query);
?>
<style>
    .leader-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .leader-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
        transition: box-shadow 0.3s ease;
    }

    .leader-item:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .leader-details {
        flex: 1;
    }

    .leader-details p {
        margin: 8px 0;
        font-size: 16px;
    }

    .leader-details p strong {
        font-weight: 600;
    }

    .leader-photo img {
        border-radius: 8px;
        width: 80px;
        height: 80px;
        object-fit: cover;
    }

    h2 {
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
    }
</style>

<div class="container mt-5">
    <h2>Data Leader di Kota <?= htmlspecialchars($kota['nama_kota'], ENT_QUOTES, 'UTF-8') ?></h2>
    <div class="leader-list">
        <?php
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="leader-item">
                <div class="leader-details">
                    <p><strong><?= $no ?>. <?= ucfirst(strtolower(htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8'))) ?></strong></p>
                    <p><strong>Alamat:</strong> <?= htmlspecialchars($row['alamat'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p><strong>Media Sosial:</strong> <?= htmlspecialchars($row['media_sosial'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <div class="leader-photo">
                    <img src='Asset/Foto_leader/<?= htmlspecialchars($row['foto'], ENT_QUOTES, 'UTF-8') ?>' alt="<?= htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8') ?> Photo">
                </div>
            </div>
            <?php
            $no++;
        }
        ?>
    </div>
</div>
