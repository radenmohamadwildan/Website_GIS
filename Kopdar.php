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
    <h1>Selamat Datang di Kopdar Smartfren Community</h1>
    <p>Kopdar adalah program di dalam Smartfren Community bersama komunitas-komunitas seperti komunitas mobil, komunitas motor, komunitas sepeda, dan lain sebagainya. Kurang lebih program ini pun sama seperti program Bunda Pintar, yang bertujuan untuk saling mengenal dan memperluas jaringan antar komunitas ke masyarakat.</p>
    
    <p>Dalam kegiatan ini pula peserta akan diberikan konsumsi, doorprize, dan provider Smartfren yang sudah dibantu mengaktivasinya langsung di tempat secara gratis oleh Smartfren Community. Kemudian ada beberapa keuntungan bagi komunitas yaitu; bertambahnya relasi, semakin dikenal luas komunitasnya oleh masyarakat, bertambahnya informasi dari edukasi yang disampaikan oleh narasumber, dan komunitas juga bisa meminta MOU kepada Smartfren.</p>
    
    <div class="cta">
        <p>Untuk informasi lebih lanjut dan lebih jelas, bergabunglah dengan Smartfren Community dan konfirmasikan jika Anda memiliki usaha, agar bisa ikut bergabung bersama Kopdar Smartfren Community.</p>
        <a href="https://chat.whatsapp.com/7mfjKhtdtT8AfR2RcUz2jr" target="_blank">Bergabung dengan Grup WhatsApp Smartfren Community</a>
    </div>
</div>
</body>
</html>
<?php
require_once 'template/footer.php'
?>
