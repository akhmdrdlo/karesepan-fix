<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">'
    <link rel="stylesheet" href="../assets/css/style.css">'
    <title>Cooks Delight</title>
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
                    <a class="nav-link text-white" href="index.html">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active" href="resep.html">Resep</a>
                </li>
            </ul>
            <a href="../login.html"><button class="btn btn-outline-light ms-3 rounded-pill">Masuk</button></a>
        </div>
    </div>
</nav>

<header class="bg-pink mt-2">
    <div class="container">
        <h1 class="text-center text-white p-4">RECIPE</h1>
    </div>
</header>

<main class="container ">
    <div class="row text-center">
        <div class="col-md-12">
            <h1>Ayam Goreng Bawang Putih</h1>
            <p>
                <span class="badge bg-secondary">2 JAM</span>
                <span class="badge bg-secondary">SULIT</span>
                <span class="badge bg-secondary">4 PORSI</span>
            </p>
            <p>Selamat datang di Cooks Delight, tempat impian kuliner menjadi nyata! Hari ini, kita akan memulai perjalanan cita rasa dengan hidangan yang menjanjikan untuk meningkatkan pengalaman makan Anda.</p>
            <img src="https://images.tokopedia.net/img/KRMmCm/2023/10/24/8dba104f-c74f-41bf-94a2-1dbe11e83d7f.jpg" class="img-fluid recipe-image" alt="">
        </div>
    </div>
</main>
<header class="bg-pink">
    <div class="container">
        <h1 class="text-center text-white p-4 mt-4">CARA MEMBUAT</h1>
    </div>
</header>

<main class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Ayam Goreng Bawang Putih</h2>
            <p>Marinasi ayam dengan bawang putih, jahe, saus tiram, kecap asin & garam. Diamkan minimal 30 menit.</p>
            <p>Gulingkan ayam ke tepung maizena tipis2 (tepung kering).</p>
            <p>Goreng ayam dengan bawang putih yang telah di geprek, sambil sesekali di aduk (goreng dalam minyak banyak, hingga ayam terendam).</p>
            <p>Angkat bawang putih apabila sudah terlebih dulu menguning & garing, lalu lanjutkan menggoreng ayam hingga matang.</p>
            <p>Sajikan ayam goreng dengan taburan bawang putih.</p>
        </div>
        <div class="col-md-4">
            <h3>BAHAN-BAHAN</h3>
            <ul>
                <li>1 ekor ayam kampung muda/ayam pejantan (potong kecil2)</li>
                <li>6 siung bawang putih (haluskan)</li>
                <li>1 ruas jahe (haluskan)</li>
                <li>2 bonggol bawang putih (geprek, jangan dikupas kulitnya)</li>
                <li>1 sdt kecap asin</li>
                <li>1 sdt saus tiram</li>
                <li>Secukupnya garam</li>
            </ul>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="col-md-6">
                    <img src="author-avatar.jpg" alt="Author Avatar" class="rounded-circle" width="30" height="30">
                    <span>By John Doe</span>
                </div>
                <div>
                    @auth
                        <i class="fal fa-heart pressLove {{$post->likes->contains('user_id',auth()->id()) ? 'redHeart' : ''}} float-right">{{$post->likes->count()}}</i>
                    @else
                        <i class="fal fa-heart pressLove float-right">{{$post->likes->count()}}</i>
                    @endauth
                    <i class="fa-solid fa-share-alt"></i>
                    <span>Bagikan</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card text-center bg-pink mt-4">
        <div class="card-body">
          <h5 class="card-title text-white">Resep Serupa</h5>
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner p-3">
                <div class="carousel-item active">
                  <div class="row">
                    <div class=" col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="es-kul-kul.jpg" class="d-block w-100" alt="Es Kul-Kul Buah">
                                <h5 class="mt-3">Es Kul-Kul Buah</h5>
                                <p>Manisnya coklat dan buah bersatu dalam kesegaran Es Kul-Kul. Mudah dan simple buatnya.</p>
                                <a href="#" class="btn btn-primary">Lihat Resep</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="nasi-goreng-seafood.jpg" class="d-block w-100" alt="Nasi Goreng Seafood">
                                <h5>Nasi Goreng Seafood</h5>
                                <p>Nasi goreng seafood dengan udang dan cumi, beraroma lezat, dan penuh cita rasa laut.</p>
                                <a href="#" class="btn btn-primary">Lihat Resep</a>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                      <div class=" col-md-6">
                          <div class="card">
                              <div class="card-body">
                                  <img src="es-kul-kul.jpg" class="d-block w-100" alt="Es Kul-Kul Buah">
                                  <h5 class="mt-3">Es Kul-Kul Buah</h5>
                                  <p>Manisnya coklat dan buah bersatu dalam kesegaran Es Kul-Kul. Mudah dan simple buatnya.</p>
                                  <a href="#" class="btn btn-primary">Lihat Resep</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="card">
                              <div class="card-body">
                                  <img src="nasi-goreng-seafood.jpg" class="d-block w-100" alt="Nasi Goreng Seafood">
                                  <h5>Nasi Goreng Seafood</h5>
                                  <p>Nasi goreng seafood dengan udang dan cumi, beraroma lezat, dan penuh cita rasa laut.</p>
                                  <a href="#" class="btn btn-primary">Lihat Resep</a>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
            <button class="carousel-control-prev"   
       type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>   
      
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
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
