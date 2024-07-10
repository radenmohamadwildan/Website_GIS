<?php
require_once 'template/head.php';
require_once 'template/javascript.php';
require_once 'Database/database.php'; 
?>

<div class="container mt-5">
  <div id="carouselExampleInterval" class="carousel slide mb-4" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php
      $db = new Database();
            $articles = $db->getAllArtikel(); // Ambil semua artikel dari database
            $count = 0;
            foreach ($articles as $article) {
                // Set active class untuk carousel item pertama
              $active = ($count == 0) ? 'active' : '';
              ?>
              <div class="carousel-item <?php echo $active; ?>" data-bs-interval="5000">
                <img src="Asset/Foto_Artikel/<?php echo htmlspecialchars($article['file_foto'], ENT_QUOTES, 'UTF-8'); ?>" class="d-block w-100 carousel-image" alt="<?php echo htmlspecialchars($article['judul_artikel'], ENT_QUOTES, 'UTF-8'); ?>">
                <div class="carousel-caption d-none d-md-block">
                  <h5><?php echo htmlspecialchars($article['judul_artikel'], ENT_QUOTES, 'UTF-8'); ?></h5>
                  <p><?php echo htmlspecialchars(substr($article['isi_artikel'], 0, 100), ENT_QUOTES, 'UTF-8'); ?>...</p>
                </div>
              </div>
              <?php
              $count++;
            }
            ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <div class="container mt-5">
          <h1 class="mb-4 text-center">Artikel</h1>
          <div class="row">
            <?php
            foreach ($articles as $article) {
              ?>
              <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                  <img src="Asset/Foto_Artikel/<?php echo htmlspecialchars($article['file_foto'], ENT_QUOTES, 'UTF-8'); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($article['judul_artikel'], ENT_QUOTES, 'UTF-8'); ?>">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($article['judul_artikel'], ENT_QUOTES, 'UTF-8'); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars(substr($article['isi_artikel'], 0, 100), ENT_QUOTES, 'UTF-8'); ?>...</p>
                    <a href="artikel.php?id=<?php echo htmlspecialchars($article['id'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-custom mb-3">Baca Selengkapnya</a>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </div>

      <?php
      require_once 'template/footer.php';
      ?>
