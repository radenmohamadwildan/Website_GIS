<?php
require_once "../template/header.php";
require_once "../template/javascript.php";
require_once "../Database/database.php";

// Initialize Database object
$db = new Database();

// Get ID from URL
$id = $_GET['id'];

// Fetch article data by ID
$artikel = $db->mysqli->query("SELECT * FROM data_artikel WHERE id='$id'");
$row = $artikel->fetch_assoc();

// Fetch list of cities
$query_kota = "SELECT id, nama_kota FROM kota";
$result_kota = $db->mysqli->query($query_kota);

// Error message for validation
$error = '';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul_artikel = $_POST['judul_artikel'];
    $isi_artikel = $_POST['isi_artikel'];
    $tanggal_publish = $_POST['tanggal_publish'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $kota_id = $_POST['kota_id'];

    // Process photo upload
    if ($_FILES['file_foto']['name']) {
        $nama_foto = $_FILES['file_foto']['name'];
        $tmp_foto = $_FILES['file_foto']['tmp_name'];
        $lokasi_foto = "../Asset/Foto_artikel/" . $nama_foto;

        // Move uploaded photo to desired location
        if (move_uploaded_file($tmp_foto, $lokasi_foto)) {
            // Delete old photo if new one uploaded successfully
            if ($row['file_foto'] && file_exists("../Asset/Foto_artikel/" . $row['file_foto'])) {
                unlink("../Asset/Foto_artikel/" . $row['file_foto']);
            }
        } else {
            $error = "Gagal mengunggah foto.";
        }
    } else {
        // If no new photo uploaded, use the existing one
        $nama_foto = $row['file_foto'];
    }

    // Update article data
    if (empty($error)) {
        $result = $db->editDataArtikel($judul_artikel, $isi_artikel, $tanggal_publish, $nama_foto, $penanggung_jawab, $kota_id, $id);
        if ($result) {
            // Redirect to Data-Artikel page if successful
            header("Location: Data-Artikel.php");
            exit();
        } else {
            $error = "Maaf, terjadi kesalahan.";
        }
    }
}
?>

<div class="container mt-5">
    <h2>Edit Artikel</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="judul_artikel">Judul Artikel:</label>
            <input type="text" class="form-control" id="judul_artikel" name="judul_artikel" value="<?php echo $row['judul_artikel']; ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="isi_artikel">Isi Artikel:</label>
            <textarea class="form-control" id="isi_artikel" name="isi_artikel" rows="5" required><?php echo $row['isi_artikel']; ?></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="tanggal_publish">Tanggal Publish:</label>
            <input type="date" class="form-control" id="tanggal_publish" name="tanggal_publish" value="<?php echo $row['tanggal_publish']; ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="penanggung_jawab">Penanggung Jawab:</label>
            <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" value="<?php echo $row['penanggung_jawab']; ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="kota_id">Kota:</label>
            <select class="form-control" id="kota_id" name="kota_id" required>
                <?php while ($row_kota = $result_kota->fetch_assoc()): ?>
                    <option value="<?php echo $row_kota['id']; ?>" <?php if ($row_kota['id'] == $row['kota_id']) echo 'selected'; ?>>
                        <?php echo $row_kota['nama_kota']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="file_foto">Foto:</label>
            <input type="file" class="form-control-file" id="file_foto" name="file_foto">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php require_once "../template/footer.php"; ?>
