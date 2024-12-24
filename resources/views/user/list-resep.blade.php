<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karesepan App</title>
    <link rel="icon" type="image/png" href="../assets/img/white_logo.png">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Laravel PWA -->
    @laravelPWA
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


<main class="container mt-4">
    <div class="container my-5">
        <!-- Section Header -->
        <div class="text-center mt-3">
            <span class="badge bg-danger text-white">RESEP</span>
            <h2 class="mt-3">MARI MEMULAI PERJALANAN MEMASAK!</h2>
            <p class="text-muted">
                Dan coba lebih banyak rasa dengan berbagai resep yang menakjubkan!!
            </p>
        </div>
    
        <!-- Filter Buttons -->
        <div class="d-flex justify-content-center my-4 text-white">
            <button class="btn btn-pink mx-2 active" id="all">SEMUA</button>
            @foreach($kat as $kategori)
                <button class="btn btn-pink mx-2" data-kategori="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</button>
            @endforeach
        </div>

        <!-- Recipe Cards -->
        <div class="row" id="resep-container">
            @foreach($resep_makanan as $resep)
                <div class="col-md-4 mb-4 resep-item" data-kategori="{{ $resep->kat_id }}">
                    <div class="card h-100">
                        <img src="{{ asset($resep->link_gambar) }}" class="card-img-top" alt="{{ $resep->nama_makanan }}" style="max-height:200px;">
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
<script>
    document.querySelectorAll('.btn.btn-pink').forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            document.querySelectorAll('.btn.btn-pink').forEach(btn => {
                btn.classList.remove('active');
            });
            // Add active class to the clicked button
            this.classList.add('active');

            // Get the category ID from the button or filter for all
            let categoryId = this.getAttribute('data-kategori');
            let resepItems = document.querySelectorAll('.resep-item');

            if (categoryId) {
                resepItems.forEach(item => {
                    if (item.getAttribute('data-kategori') === categoryId) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            } else {
                // Show all items if "SEMUA" button is clicked
                resepItems.forEach(item => {
                    item.style.display = 'block';
                });
            }
        });
    });
</script>
</body>
</html>
