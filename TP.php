<?php
require_once 'template/head.php';
require_once 'template/javascript.php';
require_once 'Database/database.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teman Kreasi Indonesia - Smartfren Community</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-size: cover;
            color: #fff;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
        }
        .container {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        h1 {
            color: #d32f2f;
            text-align: center;
        }
        p, ul {
            margin-bottom: 20px;
        }
        .highlight {
            background-color: #d32f2f;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .cta {
            text-align: center;
            margin: 20px 0;
        }
        .cta a {
            background-color: #d32f2f;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .cta a:hover {
            background-color: #9a0007;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Teman Pintar Smartfren Community</h1>
        <p>Teman Pintar adalah salah satu agenda di Smartfren Community yang melibatkan para pelajar di Indonesia. Program ini adalah program yang dapat membantu serta menyalurkan anak-anak Indonesia ke dunia digital yang baik dan benar. Contohnya, mengadakan perlombaan-perlombaan tentang dunia digital antar sekolah di suatu kota besar di Indonesia dan melakukan webinar secara gratis ke sekolah-sekolah dengan narasumber-narasumber terpilih yang terjun langsung ke dunia digital.</p>
        
        <p>Proses event Teman Pintar ini sendiri dimulai dari Leader Smartfren Community suatu wilayah yang menyeleksi 10 sekolah terbaik di kota/kabupaten tersebut untuk diberikan surat undangan oleh Smartfren Community. Kemudian, jika pihak sekolah tersebut setuju untuk bekerja sama dengan pihak Smartfren, maka tim dari Smartfren Community wilayah tersebut akan datang menjalankan programnya di sekolah terpilih. Adapun beberapa keuntungan bagi pihak sekolah yaitu; sekolah akan terbranding oleh Smartfren karena sekolah akan diekspos melalui seluruh media sosial Smartfren Community, sekolah pun bisa meminta MOU dengan pihak Smartfren Community, dan jika pihak sekolah memiliki event yang membutuhkan sponsorship, bisa dibantu oleh pihak Smartfren itu sendiri.</p>
        
        <p>Salah satu keuntungan bagi pelajar itu sendiri adalah bisa berkesempatan menjadi Brand Ambassador dari Smartfren. Yang dimana anak tersebut akan memiliki dan mendapatkan gaji per bulan dari Smartfren Community. Syarat terpilihnya yaitu dengan cara memenangkan juara 1, 2, dan 3 dalam event yang sudah Smartfren Community siapkan dan jalankan di 10 sekolah yang ada di wilayah tersebut. Untuk pemilihan pemenangnya sendiri yaitu dipilih langsung oleh juri dari pihak Smartfren.</p>
        
        <div class="cta">
            <p>Untuk informasi lebih lanjut dan lebih jelas, bergabunglah dengan Smartfren Community dan konfirmasikan jika Anda memiliki usaha, agar bisa ikut bergabung bersama Teman Pintar Smartfren Community.</p>
            <a href="https://chat.whatsapp.com/7mfjKhtdtT8AfR2RcUz2jr" target="_blank">Bergabung dengan Grup WhatsApp Smartfren Community</a>
        </div>
    </div>
</body>
</html>
<?php
require_once 'template/footer.php'
?>
