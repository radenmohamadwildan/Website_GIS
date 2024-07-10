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
        <h1>Selamat Datang di Teman Kreasi Indonesia</h1>
        <p>Teman Kreasi Indonesia adalah wadah yang didirikan Smartfren untuk mengembangkan kokreasi dan kewirausahaan sosial bagi generasi muda serta membuka peluang tumbuhnya sektor ekonomi UMKM kreatif dan digital. Saat ini telah ada 32 Teman Kreasi Indonesia yang tersebar di 30 kota. Masing-masing Teman Kreasi Indonesia dikelola oleh ketua yang memiliki usaha sendiri, sekaligus menjalankan misi untuk menjadi wadah pembinaan bagi UMKM lain di sekitar kotanya.</p>
        
        <p>Hingga saat ini, Smartfren melalui Teman Kreasi Indonesia, telah melaksanakan beberapa kegiatan yang membantu keberlangsungan lebih dari 500 UMKM di berbagai kota di Indonesia, sekaligus membuka peluang digitalisasi bagi mereka. Contohnya adalah kegiatan Teman Kreasi Cilacap, yakni Jajan Mamake yang turut mendukung penjualan hasil produksi UMKM di sekitarnya dengan mengadakan bazaar online. Produk UMKM hasil produksi lokal Cilacap tersebut antara lain berupa makanan tradisional seperti sale pisang, keripik batang (debog) pisang, tahu krispi, atau onde-onde. Sebelum adanya inisiatif ini, kebanyakan UMKM tersebut menjual produk – produknya hanya dengan menitipkannya ke toko atau kios terdekat.</p>
        
        <p>Ada juga Teman Kreasi Kabupaten Tangerang, yakni Kopi dan Topi Bambu; serta Teman Kreasi Mojokerto, yakni Eco Printing, yang memberikan bimbingan sekaligus peningkatan kapasitas pada UMKM di sekitar wilayahnya. Dengan adanya inisiatif Teman Kreasi Indonesia yang memberikan bazaar online dan kegiatan pembinaan dari Smartfren, UMKM tersebut dapat menjual produk – produknya secara online dan dapat lebih kreatif dalam memasarkan produknya, baik berupa makanan dan minuman atau bentuk lainnya.</p>
        
        <p>Teman Kreasi Pekalongan, yakni Pasar Sayoor Online dan Teman Kreasi Kota Tangerang, yakni Kopi Nineteen, telah menjalankan gerakan sosial untuk membantu UMKM di sekitarnya. Kedua Teman Kreasi tersebut menyisihkan hasil penjualan dari usahanya demi memberikan bantuan berupa sembilan bahan pokok (sembako) untuk warga yang terdampak pandemi.</p>
        
        <p>Upaya untuk memajukan dan membantu masyarakat diwujudkan Smartfren dengan memanfaatkan teknologi, inovasi produk dan layanan, serta inisiatif yang membawa perubahan dan kebaikan nyata bagi masyarakat. Semangat perusahaan untuk terus melakukan inovasi adalah berkat dukungan dari pemerintah, pelanggan, mitra dan masyarakat. Segala hal yang dilakukan Smartfren akan selalu kembali ke masyarakat. Upaya tersebut dilakukan melalui berbagai program Corporate Social Responsibility (CSR) yang terdiri dari beberapa pilar penting yaitu pendidikan, UMKM dan masyarakat digital.</p>
        
        <p>Smartfren sebelumnya telah berhasil meraih Penghargaan Utama Kategori Sustainability dalam ajang IDX Channel Anugerah Inovasi Indonesia 2020. Adapun, IDX Channel Anugerah Inovasi Indonesia merupakan ajang penghargaan bergengsi yang digelar untuk memberikan apresiasi pada inovasi yang dilakukan oleh berbagai pihak atau perusahaan. Sejumlah aspek yang dinilai dalam seleksi penghargaan ini adalah inovasi, penyelesaian masalah, kinerja, penciptaan nilai tambah di masyarakat, serta dampak yang diberikan pada perusahaan.</p>
        
        <div class="cta">
            <p>Untuk informasi lebih lanjut dan lebih jelas, bergabunglah dengan Smartfren Community dan konfirmasikan jika Anda memiliki usaha, agar bisa ikut bergabung bersama Teman Kreasi Indonesia.</p>
            <a href="https://chat.whatsapp.com/7mfjKhtdtT8AfR2RcUz2jr" target="_blank">Bergabung dengan Grup WhatsApp Smartfren Community</a>
        </div>
    </div>
</body>
</html>
<?php
require_once 'template/footer.php'
?>
