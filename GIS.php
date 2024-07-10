<?php
require_once 'template/head.php';
require_once 'template/javascript.php';
require_once "Database/database.php"; // Include the database initialization file

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
<body>
  <div class="container mt-4">
    <h3>Peta Lokasi Leader Cabang Galeri Smartfren Comunity</h3>
    <!-- Form pencarian -->
    <div class="row">
      <div class="col-md-6">
        <div class="input-group mb-3">
          <input id="searchInput" type="text" class="form-control" placeholder="Cari berdasarkan nama kota" style="max-width: 200px;">
          <button id="searchButton" class="btn btn-custom" type="button">Cari</button>
        </div>
      </div>
    </div>
    <div id="map" style="height: 500px;"></div>
  </div>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH921PsbGY8fQrOzM6TKdj-jPbqgz64yg&callback=initMap&v=weekly"defer></script>
  <script> 
   function initMap() {
    const locations = [
    // Tambahkan marker lain untuk setiap kota...
    {
      position: { lat: 5.545256309294, lng: 95.32388586727994 }, 
      title: "Leader Aceh",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Aceh</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=1">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -8.676861726959741, lng: 115.20683112228254 },  
      title: "Leader Bali",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Bali</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=2">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -1.2376218829068726, lng: 116.874914205501 },  
      title: "Leader Balikpapan",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Balikpapan</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=3">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.897792591833583, lng: 107.63265364812547 },  
      title: "Leader Bandung",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Bandung</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=4">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -3.337358297933543, lng: 114.6175613271713 },  
      title: "Leader Banjarmasin",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Banjarmasin</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=5">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: 1.1269688270426763, lng: 104.03409156990855 },  
      title: "Leader Batam",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Batam</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=6">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.240760466578463, lng: 107.00336281771631 },  
      title: "Leader Bekasi",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Bekasi</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=7">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -8.105024504717106, lng: 112.18409566830718 },  
      title: "Leader Blitar",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Blitar</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=8">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.57213766006358, lng: 106.80817213635731 }, 
      title: "Leader Bogor",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Bogor</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=9">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -0.3195127464808753, lng: 100.37695767753281 },  
      title: "Leader Bukit Tinggi",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Bukit Tinggi</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=10">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.7209205326006884, lng: 108.5506896536513 },  
      title: "Leader Cirebon",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Cirebon</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=11">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.905052314058331, lng: 110.62569778164674 },  
      title: "Leader Demak",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Demak</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=12">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.393448859967782, lng: 106.82286646506303 }, 
      title: "Leader Depok",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Depok</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=13">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.217014865239745, lng: 107.89937127047732 },  
      title: "Leader Garut",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Garut</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=14">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.164636264649767, lng: 112.64155578335524 },  
      title: "Leader Gresik",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Gresik</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=15">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.334042977105204, lng: 108.3276045867879 }, 
      title: "Leader Indramayu",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Indramayu</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=16">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -1.5990000490587633, lng: 103.6095335232946 }, 
      title: "Leader Jambi",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Jambi</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=17">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.18503743210473, lng: 106.8257032003751 }, 
      title: "Leader Jakarta",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Jakarta</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=18">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -8.186014591834372, lng: 113.66688563564404 },  
      title: "Leader Jember",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Jember</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=19">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.589818374841094, lng: 110.6624511911022 }, 
      title: "Leader Jepara",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Jepara</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=20">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.309477106350098, lng: 107.30515693009195 },  
      title: "Leader Karawang",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Karawang</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=21">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.811158080061085, lng: 112.00967069453328 },  
      title: "Leader Kediri",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Kediri</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=22">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.923234843672476, lng: 110.17653966568339 },  
      title: "Leader Kendal",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Kendal</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=23">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.702395887013466, lng: 110.60330982211522 },  
      title: "Leader Klaten",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Klaten</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=24">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.817750913612315, lng: 110.84032554373496 },  
      title: "Leader Kudus",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Kudus</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=25">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -3.784885770785567, lng: 103.53925436164606 },  
      title: "Leader Lahat",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Lahat</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=26">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -5.116291567880586, lng: 105.30665348897891 }, 
      title: "Leader Lampung",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Lampung</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=27">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.869235949844943, lng: 112.36436085502994 },  
      title: "Leader Lamongan",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Lamongan</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=28">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.458313926027671, lng: 110.22301196167678 },  
      title: "Leader Magelang",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Magelang</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=29">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -5.137923682130514, lng: 119.4418030727025 },  
      title: "Leader Makasar",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Makasar</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=30">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.653344663193918, lng: 111.52343748497987 },  
      title: "Leader Madiun",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Madiun</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=31">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.159932602622505, lng: 113.47761138510675 },  
      title: "Leader Madura",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Madura</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=32">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.9449657611267, lng: 112.61980751516408 }, 
      title: "Leader Malang",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Malang</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=33">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: 1.4776090985198396, lng: 124.83427045334157 },  
      title: "Leader Manado",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Manado</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=34">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -8.584324806175207, lng: 116.11555625791023 },  
      title: "Leader Mataram",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Mataram</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=35">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: 3.604593900003452, lng: 98.66897025822263 }, 
      title: "Leader Medan",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Medan</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=36">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.474050358953472, lng: 112.43986275544916 }, 
      title: "Leader Mojokerto",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Mojokerto</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=37">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -2.1411180867353803, lng: 106.10142753004554 }, 
      title: "Leader Pangkal Pinang",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Pangkal Pinang</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=38">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.643829981692626, lng: 112.90787436909275 }, 
      title: "Leader Pasuruan",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Pasuruan</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=39">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.7478301361365265, lng: 111.02915419741792 }, 
      title: "Leader Pati",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Pati</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=40">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.87802905985745, lng: 109.67138398354425 }, 
      title: "Leader Pekalongan",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Pekalongan</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=41">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: 0.5216690879111952, lng: 101.44709076500065 },  
      title: "Leader Pekanbaru",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Pekanbaru</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=42">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.894291197025896, lng: 109.4223456129547 },  
      title: "Leader Pemalang",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Pemalang</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=43">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -0.05196284165671934, lng: 109.34611960671975 }, 
      title: "Leader Pontianak",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Pontianak</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=44">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.86518057819766, lng: 111.47481913564062 }, 
      title: "Leader Ponorogo",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Ponorogo</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=45">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -3.418873177219273, lng: 104.25293218183144 }, 
      title: "Leader Prabumulih",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Prabumulih</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=46">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.715175634362899, lng: 110.01555489453158 },  
      title: "Leader Purworejo",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Purworejo</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=47">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.724545359201231, lng: 111.34925699451858 }, 
      title: "Leader Rembang",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Rembang</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=48">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.321639427589111, lng: 110.49654572397486 }, 
      title: "Leader Salatiga",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Salatiga</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=49">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.990975414513612, lng: 110.42532746563278 }, 
      title: "Leader Semarang",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Semarang</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=50">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.459868127659597, lng: 112.71577472392718 }, 
      title: "Leader Sidoarjo",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Sidoarjo</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=51">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.9127314485164275, lng: 106.89930173970212 },  
      title: "Leader Sukabumi",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Sukabumi</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=52">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.853634006103878, lng: 107.9224915842839 },  
      title: "Leader Sumedang",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Sumedang</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=53">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.425492718485885, lng: 111.02897308161018 }, 
      title: "Leader Sragen",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Sragen</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=54">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.2630817712227955, lng: 112.74803517338542 }, 
      title: "Leader Surabaya",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Surabaya</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=55">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.569806929683623, lng: 110.82113369330668 },  
      title: "Leader Surakarta",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Surakarta</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=56">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.272193565518104, lng: 106.742813314405 }, 
      title: "Leader Tangerang",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Tangerang</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=57">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.3317224577353075, lng: 108.23395206507746 }, 
      title: "Leader Tasikmalaya",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Tasikmalaya</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=58">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.865514539523333, lng: 109.12018981350965 }, 
      title: "Leader Tegal",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Tegal</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=59">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -6.890327865987523, lng: 112.05061451230944 }, 
      title: "Leader Tuban",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Tuban</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=60">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -8.060098308387142, lng: 111.90713057674633 }, 
      title: "Leader Tulungagung",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Tulungagung</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=61">Info leader</a></p>
      </div>
      </div>`
    },
    {
      position: { lat: -7.800073657348665, lng: 110.39332690556265 }, 
      title: "Leader Yogyakarta",
      content: `
      <div id="content">
      <h4 id="firstHeading" class="firstHeading">Leader Yogyakarta</h4>
      <div id="bodyContent">
      Info leader lebih lanjut silahkan klik link dibawah</p>
      <p><a href="get_leaders.php?kota_id=62">Info leader</a></p>
      </div>
      </div>`
    },
    ];


const map = new google.maps.Map(document.getElementById("map"), {
  zoom: 5,
  center: locations[5].position,
});

const markers = [];
const infowindows = [];

    // Menambahkan marker dan infowindow untuk setiap lokasi
locations.forEach(location => {
  const marker = new google.maps.Marker({
    position: location.position,
    map: map,
    title: location.title,
  });
  markers.push(marker);

  const infowindow = new google.maps.InfoWindow({
    content: location.content,
    maxWidth: 400,
    ariaLabel: location.title,
  });
  infowindows.push(infowindow);

        // Menambahkan event listener untuk membuka infowindow ketika marker diklik
  marker.addListener("click", () => {
            infowindows.forEach(iw => iw.close()); // Tutup infowindow yang terbuka sebelumnya
            // Open the infowindow with dynamic content fetched from get_leaders.php
            fetch(location.content.match(/get_leaders\.php\?kota_id=(\d+)/)[0])
            .then(response => response.text())
            .then(data => {
              infowindow.setContent(data);
              infowindow.open(map, marker);
            })
            .catch(error => console.error('Error fetching leaders data:', error));
          });
});

   // Simpan zoom dan pusat peta awal
let initialZoom = map.getZoom();
let initialCenter = map.getCenter();

function searchLocation() {
  const input = document.getElementById("searchInput").value.toLowerCase();
  if (input === "") {
    // Menampilkan semua marker jika input pencarian kosong
    markers.forEach(marker => marker.setVisible(true));
    // Mengembalikan zoom dan pusat peta ke nilai awal
    map.setZoom(initialZoom);
    map.setCenter(initialCenter);
    return;
  }

  let foundMarkers = []; // Menyimpan marker yang ditemukan

  markers.forEach((marker, index) => {
    const title = locations[index].title.toLowerCase();
    if (title.includes(input)) {
      marker.setVisible(true);
      foundMarkers.push(marker); // Menambahkan marker yang ditemukan ke dalam array
    } else {
      marker.setVisible(false);
    }
  });

  if (foundMarkers.length === 1) {
    // Jika hanya satu marker yang ditemukan, atur pusat peta ke marker tersebut
    map.setCenter(foundMarkers[0].getPosition());
    map.setZoom(18); // Zoom untuk menunjukkan lokasi yang ditemukan
  } else if (foundMarkers.length > 1) {
    // Jika lebih dari satu marker yang ditemukan, atur pusat peta agar semua marker terlihat
    let bounds = new google.maps.LatLngBounds();
    foundMarkers.forEach(marker => bounds.extend(marker.getPosition()));
    map.fitBounds(bounds);
  }
}

    // Event listener untuk tombol "Cari"
document.getElementById("searchButton").addEventListener("click", function () {
        // Panggil fungsi pencarian saat tombol "Cari" ditekan
  searchLocation();
});

    // Event listener untuk input pencarian
document.getElementById("searchInput").addEventListener("keypress", function (event) {
        // Periksa apakah tombol yang ditekan adalah "Enter" (kode kunci 13)
  if (event.keyCode === 13) {
            // Panggil fungsi pencarian saat tombol "Enter" ditekan dalam input pencarian
    searchLocation();
  }
});
}
</script>
</body>
<?php
require_once 'template/footer.php'
?>