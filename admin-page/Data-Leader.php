<?php
require_once "../template/header.php";
require_once "../template/javascript.php";
require_once "../Database/database.php";

// Inisialisasi objek Database
$db = new Database();

// Mendefinisikan jumlah item per halaman
$items_per_page = 5;

// Mendapatkan halaman saat ini
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Menghitung offset untuk query
$offset = ($current_page - 1) * $items_per_page;

// Ambil data leader dari database dengan pagination
$query = "SELECT * FROM data_leader LIMIT $items_per_page OFFSET $offset";
$result = $db->mysqli->query($query);

// Mendapatkan jumlah total data leader
$total_rows_query = "SELECT COUNT(*) AS total_rows FROM data_leader";
$total_rows_result = $db->mysqli->query($total_rows_query);
$total_rows = $total_rows_result->fetch_assoc()['total_rows'];

// Menghitung jumlah halaman
$total_pages = ceil($total_rows / $items_per_page);
?>

<div class="container mt-5">
  <h2>Data Leader</h2>
  <a href="Tambah-Leader.php" class="btn btn-custom mb-3">Tambah Data Leader</a>
  <!-- Pagination di atas tabel -->
  <nav aria-label="Page navigation" class="d-flex justify-content-between mb-3">
    <ul class="pagination">
      <?php if ($current_page > 1) : ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="ml-1">Previous</span>
          </a>
        </li>
      <?php endif; ?>

      <?php
      if ($total_pages <= 5) {
        // Jika total halaman kurang atau sama dengan 5, tampilkan semua halaman
        for ($page = 1; $page <= $total_pages; $page++) : ?>
          <li class="page-item <?php echo ($page == $current_page) ? 'active' : ''; ?>">
            <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
          </li>
        <?php endfor;
      } else {
        // Tampilkan halaman pertama
        ?>
        <li class="page-item <?php echo (1 == $current_page) ? 'active' : ''; ?>">
          <a class="page-link" href="?page=1">1</a>
        </li>
        <?php if ($current_page > 4) : ?>
          <li class="page-item">
            <span class="page-link">...</span>
          </li>
        <?php endif; ?>
        
        <?php
        // Tampilkan halaman sekitar halaman saat ini
        $start_page = max(2, $current_page - 2);
        $end_page = min($total_pages - 1, $current_page + 2);

        for ($page = $start_page; $page <= $end_page; $page++) : ?>
          <li class="page-item <?php echo ($page == $current_page) ? 'active' : ''; ?>">
            <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
          </li>
        <?php endfor;

        if ($current_page < $total_pages - 3) : ?>
          <li class="page-item">
            <span class="page-link">...</span>
          </li>
        <?php endif; ?>

        <li class="page-item <?php echo ($total_pages == $current_page) ? 'active' : ''; ?>">
          <a class="page-link" href="?page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a>
        </li>
      <?php } ?>

      <?php if ($current_page < $total_pages) : ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo $current_page + 1; ?>" aria-label="Next">
            <span class="mr-1">Next</span>
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
  <table class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Media Sosial</th>
        <th>Foto</th>
        <th>Kota</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = ($current_page - 1) * $items_per_page + 1;
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['alamat'] . "</td>";
        echo "<td>" . $row['media_sosial'] . "</td>";
        echo "<td><img src='../Asset/Foto_leader/" . $row['foto'] . "' width='100'></td>"; // Ubah path/to/images/ sesuai dengan path gambar
        echo "<td>" . $db->getNamaKota($row['kota_id']) . "</td>"; // Mengambil nama kota berdasarkan kota_id
        echo "<td>";
        echo "<a href='Edit-Leader.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a>"; // Tautan untuk mengedit data
        echo "<a href='Hapus-Leader.php?id=" . $row['id'] . "' class='btn btn-danger ml-2'>Hapus</a>"; // Tautan untuk menghapus data
        echo "</td>";
        echo "</tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
</div>
