<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">'
    <link rel="stylesheet" href="../assets/css/style.css">'
    <title>Karesepan App</title>
    <link rel="icon" type="image/png" href="../assets/img/white_logo.png">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../assets/img/white_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            <span class="text-white text-center font-weight-bolder">Karesepan App</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active" href="/list_resep">Resep</a>
                </li>
            </ul>
            <a href="/signin"><button class="btn btn-outline-light ms-3 rounded-pill">Masuk</button></a>
        </div>
    </div>
</nav>

<header class="bg-pink mt-2">
    <div class="container">
        <h1 class="text-center text-white p-4">RESEP</h1>
    </div>
</header>

<main class="container ">
    <div class="row text-center">
        <div class="col-md-12">
            <h1>{{ $resepJoin->nama_makanan }}</h1>
            <h3><span class="badge bg-secondary">{{ $resepJoin->nama_kategori }}</span></h3>
            <p>{{$resepJoin->deskripsi}}</p>
            <img src="../{{$resepJoin->link_gambar}}" class="img-fluid recipe-image" alt="">
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
        <!-- Recipe Content -->
        <div class="col-md-8">
            <h3>Langkah-Langkah:</h3>
            <ol>
                @foreach(explode('.', $resepJoin->cara_buat) as $langkah)
                    @if(trim($langkah) != ' ')
                    <ul>{{ trim($langkah) }}</ul>
                    @endif<!-- Menampilkan langkah-langkah resepJoin -->
                @endforeach
            </ol>
        </div>

        <!-- Ingredients -->
        <div class="col-md-4">
            <h3>BAHAN-BAHAN</h3>
            <ul>
                <ol>
                    {!! nl2br(e($resepJoin->resep)) !!}
                </ol><!-- Menampilkan bahan-bahan resepJoin -->
            </ul>
        </div>
    </div>

    <!-- Author Info & Like/Share -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="col-md-6">
                    <img src="../{{ $resepJoin->poto}}" alt="Author Avatar" class="rounded-circle" width="75" height="75">
                    <span>Recipe by <b>{{ $resepJoin->user_name }}</b></span>
                </div>
                {{-- <div>
                    @auth
                        <i class="fal fa-heart pressLove {{$resep->likes->contains('user_id',auth()->id()) ? 'redHeart' : ''}} float-right">{{$resep->likes->count()}}</i>
                    @else
                        <i class="fal fa-heart pressLove float-right">{{$resep->likes->count()}}</i>
                    @endauth
                    <i class="fa-solid fa-share-alt"></i>
                    <span>Bagikan</span>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="card text-center bg-pink mt-4">
        <div class="card-body">
            <h5 class="card-title text-white">Resep Serupa</h5>
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($resepAll->chunk(2) as $index => $recipePair) {{-- Group by 2 --}}
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($recipePair as $resep)
                                    <div class="col-md-6">
                                        <div class="card">
                                            <img src="{{ asset($resep->link_gambar) }}" class="card-img-top img-fluid" style="max-height: 200px; object-fit: cover;" alt="{{ $resep->nama_makanan }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $resep->nama_makanan }}</h5>
                                                <p class="card-text">{{ $resep->deskripsi }}</p>
                                                <a href="{{ route('User.rsp', $resep->id) }}" class="btn btn-outline-dark w-100">LIHAT RESEP</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            
                <!-- Controls -->
                <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#recipeCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
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
                    <img src="../assets/img/white_logo.png" alt="Karesepan Logo">
                    Karesepan
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
