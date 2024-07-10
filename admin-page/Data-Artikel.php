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

// Ambil data artikel dari database dengan pagination
$query = "
SELECT a.id, a.judul_artikel, a.isi_artikel, a.tanggal_publish, a.file_foto, a.penanggung_jawab, k.nama_kota
FROM data_artikel a
LEFT JOIN kota k ON a.kota_id = k.id
LIMIT $items_per_page OFFSET $offset
";
$result = $db->mysqli->query($query);

// Mendapatkan jumlah total data artikel
$total_rows_query = "SELECT COUNT(*) AS total_rows FROM data_artikel";
$total_rows_result = $db->mysqli->query($total_rows_query);
$total_rows = $total_rows_result->fetch_assoc()['total_rows'];

// Menghitung jumlah halaman
$total_pages = ceil($total_rows / $items_per_page);
?>

<div class="container mt-5">
    <h2>Daftar Artikel</h2>
    <a href="Tambah-Artikel.php" class="btn btn-custom mb-3">Tambah Artikel</a>
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
                <th scope="col">ID</th>
                <th scope="col">Judul</th>
                <th scope="col">Isi</th>
                <th scope="col">Tanggal Publish</th>
                <th scope="col">Foto</th>
                <th scope="col">Penanggung Jawab</th>
                <th scope="col">Kota</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<th scope='row'>" . $row['id'] . "</th>";
                echo "<td>" . $row['judul_artikel'] . "</td>";
                echo "<td>" . $row['isi_artikel'] . "</td>";
                echo "<td>" . $row['tanggal_publish'] . "</td>";
                echo "<td><img src='../Asset/Foto_artikel/" . $row['file_foto'] . "' width='100'></td>";
                echo "<td>" . $row['penanggung_jawab'] . "</td>";
                echo "<td>" . $row['nama_kota'] . "</td>";
                echo "<td>";
                echo "<a href='Edit-Artikel.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a>";
                echo "<a href='Hapus-Artikel.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm ml-1'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <!-- Pagination di bawah tabel -->
    <nav aria-label="Page navigation" class="d-flex justify-content-between mt-3">
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
                for ($page = 1; $page <= $total_pages; $page++) : ?>
                    <li class="page-item <?php echo ($page == $current_page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                    </li>
                <?php endfor;
            } else {
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
</div>

<?php
require_once "../template/footer.php";
?>
