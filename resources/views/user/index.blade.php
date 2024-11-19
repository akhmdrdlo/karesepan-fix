<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooks Delight</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .banner {
            background-image: url('https://asset.kompas.com/crops/orQq3RlnkPNDfQgRASMWfCMppwg=/0x32:1000x699/1200x800/data/photo/2021/07/16/60f0d221ba7a6.jpeg');
            background-size: cover;
            background-position: center;
            height: 60vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 2rem;
            border-radius: 20px;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            <span class="text-white text-center font-weight-bolder">Karesepan App</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="resep.html">Resep</a>
                </li>
            </ul>
            <a href="/signin"><button class="btn btn-outline-light ms-3 rounded-pill">Masuk</button></a>
        </div>
    </div>
</nav>

<main class="container">
    <!-- Banner Section -->
    <div class="container mt-4">
        <div class="banner">
            <h1 class="display-5 fw-bold">TEMPATNYA RESEP MAKANAN ENAK!!</h1>
            <h3 class="lead">Selamat datang di dunia penuh cita rasa! Temukan resep-resep unik buatan tangan dengan penuh cinta, dan biarkan aroma kelezatan menggoda</h3>
            <a href="list-resep.html" class="btn btn-custom mt-3">Jelajahi Resep Baru</a>
        </div>
    </div>
    
    <div class="container my-5">
        <!-- Section Header -->
        <div class="text-center">
            <span class="badge bg-danger text-white">RESEP</span>
            <h2 class="mt-3">MARI MEMULAI PERJALANAN MEMASAK!</h2>
            <p class="text-muted">With our diverse collection of recipes we have something to satisfy every palate.</p>
        </div>
    
        <!-- Filter Buttons -->
        <div class="d-flex justify-content-center my-4 text-white">
            <button class="btn btn-pink mx-2 active">SEMUA</button>
            <button class="btn btn-pink mx-2">SARAPAN</button>
            <button class="btn btn-pink mx-2">MAKAN SIANG</button>
            <button class="btn btn-pink mx-2">MAKAN MALAM</button>
            <button class="btn btn-pink mx-2">PENUTUP</button>
        </div>
    
        <!-- Recipe Cards -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Ayam Goreng Bawang Putih">
                    <div class="card-body">
                        <h5 class="card-title">Ayam Goreng Bawang Putih</h5>
                        <p class="card-text">Ayam goreng renyah berbumbu bawang putih gurih, sempurna untuk hidangan sehari-hari.</p>
                        <a href="#" class="btn btn-outline-dark w-100">LIHAT RESEP</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Nasi Goreng Seafood">
                    <div class="card-body">
                        <h5 class="card-title">Nasi Goreng Seafood</h5>
                        <p class="card-text">Nasi goreng seafood dengan udang dan cumi, beraroma lezat, dan penuh cita rasa laut.</p>
                        <a href="#" class="btn btn-outline-dark w-100">LIHAT RESEP</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Sayur Bening Bayam">
                    <div class="card-body">
                        <h5 class="card-title">Sayur Bening Bayam</h5>
                        <p class="card-text">Sayur bening bayam yang segar dan gurih, kaya vitamin, cocok untuk menu sehat.</p>
                        <a href="#" class="btn btn-outline-dark w-100">VIEW RECIPE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid ">
        <div class="container card bg-pink">
            <div class="row">
                <div class="col-md-6 card-header">
                    <h2>KULINER KAMI</h2>
                    <p>Perjalanan kami diwarnai dengan dedikasi, kreativitas, dan komitmen yang tak tergoyahkan untuk menyajikan pengalaman kuliner yang memikat. Bergabunglah bersama kami dalam menikmati setiap hidangan dan kisah yang terungkap.</p>
                    <a href="#" class="btn btn-custom">Baca Selengkapnya</a>
                </div>
                <div class="col-md-6 card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="image1.jpg" alt="Image 1" class="img-fluid">
                        </div>
                        <div class="col-6">
                            <img src="image2.jpg" alt="Image 2" class="img-fluid">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <img src="image3.jpg" alt="Image 3" class="img-fluid">
                        </div>
                        <div class="col-6">
                            <img src="image4.jpg" alt="Image 4" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="hero btn-custom text-white text-center mt-5">
        <div class="container">
            <h1>BERGABUNGLAH DAN UNGGAH RESEP ANDA SEKARANG!</h1>
            <p>Berlangganan untuk mendapatkan sajian resep mingguan, tips memasak, dan wawasan eksklusif.</p>
        </div>
    </section>

</main>



<footer class="bg-dark text-light text-center py-3 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="navbar-brand">
                    <img src="logo.png" alt="Cooks Delight Logo">
                    Cooks Delight
                </a>
            </div>
            <div class="col-md-6">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Resep</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                </ul>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-tiktok"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-instagram"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-youtube"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <p class="mt-3">Copyright © 2024 Cooks Delight</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
