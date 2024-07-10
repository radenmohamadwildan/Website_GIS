<?php
require_once "../template/header.php";
require_once "../template/javascript.php";
require_once "../Database/database.php";

// Inisialisasi objek Database
$db = new Database();

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data leader berdasarkan ID
$leader = $db->mysqli->query("SELECT * FROM data_leader WHERE id='$id'");
$row = $leader->fetch_assoc();

// Ambil data kota untuk dropdown
$query_kota = "SELECT * FROM kota";
$result_kota = $db->mysqli->query($query_kota);

// Pesan kesalahan untuk validasi
$error = '';

// Proses ketika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $media_sosial = $_POST['media_sosial'];
    $kota_id = $_POST['kota_id'];

    // Proses foto jika diunggah
    if ($_FILES['foto']['name']) {
        $nama_foto = $_FILES['foto']['name'];
        $tmp_foto = $_FILES['foto']['tmp_name'];
        $lokasi_foto = "../Asset/Foto_leader/" . $nama_foto;

        // Pindahkan foto yang diunggah ke lokasi yang diinginkan
        if (move_uploaded_file($tmp_foto, $lokasi_foto)) {
            // Hapus foto lama jika berhasil mengunggah foto baru
            if ($row['foto'] && file_exists("../Asset/Foto_leader/" . $row['foto'])) {
                unlink("../Asset/Foto_leader/" . $row['foto']);
            }
        } else {
            $error = "Gagal mengunggah foto.";
        }
    } else {
        // Jika tidak ada foto baru diunggah, gunakan foto yang ada sebelumnya
        $nama_foto = $row['foto'];
    }

    // Update data leader
    if (empty($error)) {
        $result = $db->editDataLeader($nama, $alamat, $media_sosial, $nama_foto, $kota_id, $id);
        if ($result) {
            // Redirect ke halaman Data-Leader jika berhasil
            header("Location: Data-Leader.php");
            exit();
        } else {
            $error = "Maaf, terjadi kesalahan.";
        }
    }
}
?>

<div class="container mt-5">
    <h2>Edit Data Leader</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="alamat">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>">
        </div>
        <div class="form-group mb-3">
            <label for="media_sosial">Media Sosial:</label>
            <input type="text" class="form-control" id="media_sosial" name="media_sosial" value="<?php echo $row['media_sosial']; ?>">
        </div>
        <div class="form-group mb-3">
            <label for="foto">Foto:</label>
            <input type="file" class="form-control-file" id="foto" name="foto">
        </div>
        <div class="form-group mb-3">
            <label for="kota_id">Kota:</label>
            <select class="form-control" id="kota_id" name="kota_id">
                <?php
                while ($row_kota = $result_kota->fetch_assoc()) {
                    $selected = ($row_kota['id'] == $row['kota_id']) ? 'selected' : '';
                    echo "<option value='" . $row_kota['id'] . "' $selected>" . $row_kota['nama_kota'] . "</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php require_once "../template/footer.php"; ?>
