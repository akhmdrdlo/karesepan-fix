<html>
<head>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      background-image: url('assets/img/bglogin.png');
      font-family: Arial, sans-serif;
    }
  </style>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Laravel PWA -->
  @laravelPWA
</head>
<body>
  <main class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="row">
      <div class="col-md-6">
        <div class="image-container">
          <img src="https://img-global.cpcdn.com/recipes/35f21a75b8c9b0ad/680x482cq70/cakwe-cakue-bandung-foto-resep-utama.jpg" alt="Profile picture"/>
        </div>
      </div>
      <div class="col-md-6">
        <div class="register-container">
          <div class="register-card">
            <h2>
              DAFTARKAN DIRI ANDA!!
            </h2>
            <form action="/register" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="username">
                  USERNAME*
                </label>
                <input class="form-control" id="username" name="username" placeholder="Enter username" type="text"/>
              </div>
              <div class="form-group">
                <label for="nama">
                  NAMA*
                </label>
                <input class="form-control" id="name" name="name" placeholder="Enter your name" type="text"/>
              </div>
              <div class="form-group">
                <label for="email">
                  ALAMAT EMAIL*
                </label>
                <input class="form-control" id="email" name="email" placeholder="Enter your email address" type="text"/>
              </div>
              <div class="form-group">
                <label for="password">
                  PASSWORD*
                </label>
                <input class="form-control" id="password" name="password" placeholder="Enter password" type="password"/>
              </div>
              <div class="form-group">
                <label for="poto">
                  FOTO PROFIL (OPSIONAL)
                </label>
                <input class="form-control" id="poto" name="poto" placeholder="Upload picture" type="file"/>
              </div>
              <button class="btn btn-register" type="submit">
                DAFTAR!!
              </button>
              <div class="form-group mt-2">
                <p>
                  Sudah punya akun? <a href="/">Masuk!</a>
                </p>
              </div>
            </form>
            @if (session('success'))
            <div class="alert alert-success text-dark">
                {{ session('success') }}
            </div>
        @elseif (session('danger'))
            <div class="alert alert-danger text-dark">
                {{ session('danger') }}
            </div>
        @endif
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>