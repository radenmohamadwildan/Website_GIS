<?php
require_once "template/head.php";
require_once "template/javascript.php";
require_once "Database/database.php";

// Inisialisasi objek Database
$db = new Database();

// Ambil nilai pencarian dari parameter GET
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Ambil data kota dari tabel markers berdasarkan pencarian
$query_kota = "SELECT * FROM kota WHERE nama_kota LIKE ?";
$stmt = $db->mysqli->prepare($query_kota);
$search_param = '%' . $search . '%';
$stmt->bind_param("s", $search_param);
$stmt->execute();
$result_kota = $stmt->get_result();
?>

<div class="container mt-4">
  <h2>Daftar Agenda Leader Smartfren Comunity</h2>
  
  <!-- Form Pencarian -->
  <form method="GET" action="" class="mb-4">
    <div class="input-group">
      <input type="text" name="search" class="form-control" placeholder="Cari kota" style="max-width: 200px;" value="<?= htmlspecialchars($search) ?>">
      <button type="submit" class="btn btn-custom">Cari</button>
    </div>
  </form>
  
  <div class="row">
    <?php while ($row_kota = $result_kota->fetch_assoc()): ?>
      <div class="col-md-3 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row_kota['nama_kota']) ?></h5>
            <a href="get_Artikel.php?kota_id=<?= intval($row_kota['id']) ?>" class="btn btn-custom">Lihat Agenda Leader</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<?php
require_once 'template/footer.php'
?>