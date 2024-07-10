<?php
require_once "../template/header.php";
require_once "../template/javascript.php";
require_once "../Database/database.php";

// Inisialisasi objek Database
$db = new Database();

// Pesan kesalahan untuk validasi
$error = '';

// Ambil daftar kota dari database
$query_kota = "SELECT id, nama_kota FROM kota";
$result_kota = $db->mysqli->query($query_kota);

// Proses ketika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul_artikel = $_POST['judul_artikel'];
    $isi_artikel = $_POST['isi_artikel'];
    $tanggal_publish = $_POST['tanggal_publish'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $kota_id = $_POST['kota_id'];

    // Proses unggah foto
    $target_dir = "../Asset/Foto_artikel/"; // Direktori tempat menyimpan foto
    $target_file = $target_dir . basename($_FILES["file_foto"]["name"]); // Path lengkap file yang akan diunggah
    $uploadOk = 1; // Penanda apakah unggah berhasil

    // Periksa apakah file gambar atau bukan
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file_foto"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $error = "File bukan gambar.";
            $uploadOk = 0;
        }
    }

    // Periksa apakah file sudah ada
    if (file_exists($target_file)) {
        $error = "Maaf, file sudah ada.";
        $uploadOk = 0;
    }

    // Periksa ukuran file
    if ($_FILES["file_foto"]["size"] > 500000) {
        $error = "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Uji unggah jika tidak ada kesalahan
    if ($uploadOk == 0) {
        if (empty($error)) {
            $error = "Maaf, file tidak diunggah.";
        }
    } else {
        if (move_uploaded_file($_FILES["file_foto"]["tmp_name"], $target_file)) {
            // Jika berhasil unggah, tambahkan data ke database
            $result = $db->tambahDataArtikel($judul_artikel, $isi_artikel, $tanggal_publish, $_FILES["file_foto"]["name"], $penanggung_jawab, $kota_id);
            if($result){
                // Redirect ke halaman Data-Artikel jika berhasil
                header("Location: Data-Artikel.php");
                exit();
            } else {
                $error = "Maaf, terjadi kesalahan saat menyimpan data ke database.";
            }
        } else {
            $error = "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
}
?>

<div class="container mt-5">
    <h2>Tambah Artikel</h2>
    <?php if(!empty($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="judul_artikel">Judul Artikel:</label>
            <input type="text" class="form-control" id="judul_artikel" name="judul_artikel" required>
        </div>
        <div class="form-group mb-3">
            <label for="isi_artikel">Isi Artikel:</label>
            <textarea class="form-control" id="isi_artikel" name="isi_artikel" rows="5" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="tanggal_publish">Tanggal Publish:</label>
            <input type="date" class="form-control" id="tanggal_publish" name="tanggal_publish" required>
        </div>
        <div class="form-group mb-3">
            <label for="penanggung_jawab">Penanggung Jawab:</label>
            <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" required>
        </div>
        <div class="form-group mb-3">
            <label for="kota_id">Kota:</label>
            <select class="form-control" id="kota_id" name="kota_id" required>
                <?php while ($row_kota = $result_kota->fetch_assoc()): ?>
                    <option value="<?php echo $row_kota['id']; ?>"><?php echo $row_kota['nama_kota']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="file_foto">Foto:</label>
            <input type="file" class="form-control-file" id="file_foto" name="file_foto">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>

<?php require_once "../template/footer.php"; ?>
