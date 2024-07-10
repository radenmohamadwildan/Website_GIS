<?php
require_once "../template/header.php";
require_once "../template/javascript.php";
require_once "../Database/database.php";

// Inisialisasi objek Database
$db = new Database();

// Ambil data kota untuk dropdown
$query_kota = "SELECT * FROM kota";
$result_kota = $db->mysqli->query($query_kota);

// Pesan kesalahan untuk validasi
$error = '';

// Fungsi untuk mendapatkan nama file baru jika file sudah ada
function getNewFileName($target_dir, $file_name) {
    $path_parts = pathinfo($file_name);
    $base_name = $path_parts['filename'];
    $extension = isset($path_parts['extension']) ? "." . $path_parts['extension'] : '';
    
    $new_file_name = $file_name;
    $i = 1;
    while (file_exists($target_dir . $new_file_name)) {
        $new_file_name = $base_name . '-' . str_pad($i, 2, '0', STR_PAD_LEFT) . $extension;
        $i++;
    }
    return $new_file_name;
}

// Proses ketika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $media_sosial = $_POST['media_sosial'];
    $kota_id = $_POST['kota_id'];

    // Proses unggah foto
    $target_dir = "../Asset/Foto_leader/"; // Direktori tempat menyimpan foto
    $original_file_name = basename($_FILES["foto"]["name"]); // Nama asli file yang diunggah
    $target_file = $target_dir . $original_file_name; // Path lengkap file yang akan diunggah
    $uploadOk = 1; // Penanda apakah unggah berhasil

    // Periksa apakah file gambar atau bukan
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $error = "File bukan gambar.";
            $uploadOk = 0;
        }
    }

    // Periksa apakah file sudah ada, jika iya tambahkan angka pada nama file
    if (file_exists($target_file)) {
        $original_file_name = getNewFileName($target_dir, $original_file_name);
        $target_file = $target_dir . $original_file_name;
    }

    // Periksa ukuran file
    if ($_FILES["foto"]["size"] > 500000) {
        $error = "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Uji unggah jika tidak ada kesalahan
    if ($uploadOk == 0) {
        $error = "Maaf, file tidak diunggah.";
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            // Jika berhasil unggah, tambahkan data ke database
            $result = $db->tambahDataLeader($nama, $alamat, $media_sosial, $original_file_name, $kota_id);
            if ($result) {
                // Redirect ke halaman Data-Leader jika berhasil
                header("Location: Data-Leader.php");
                exit();
            } else {
                $error = "Maaf, terjadi kesalahan.";
            }
        } else {
            $error = "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
}
?>

<div class="container mt-5">
    <h2>Tambah Data Leader</h2>
    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group mb-3">
            <label for="alamat">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat">
        </div>
        <div class="form-group mb-3">
            <label for="media_sosial">Media Sosial:</label>
            <input type="text" class="form-control" id="media_sosial" name="media_sosial">
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
                    echo "<option value='" . $row_kota['id'] . "'>" . $row_kota['nama_kota'] . "</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>

<?php require_once "../template/footer.php"; ?>
