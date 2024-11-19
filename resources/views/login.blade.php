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
        <div class="login-container">
          <div class="login-card">
            <h2>
              LOGIN
            </h2>
            <form role="form" method="post" action="/login"> 
              @csrf
              <div class="form-group">
                <label for="username">
                  USERNAME*
                </label>
                <input class="form-control" id="username" name="username" placeholder="Enter username" type="text"/>
              </div>
              <div class="form-group">
                <label for="password">
                  PASSWORD*
                </label>
                <input class="form-control" id="password" name="password" placeholder="Enter password" type="password"/>
              </div>
              <button class="btn btn-register" type="submit">
                LOGIN
              </button>
              <div class="form-group mt-3">
                <p>Belum punya akun? Daftar yuk <a href="daftar">disini!!</a> </p> 
              </div>
            </form>
                  @if (session('success'))
                      <div class="alert alert-success text-white">
                          {{ session('success') }}
                      </div>
                  @elseif (session('danger'))
                      <div class="alert alert-danger text-white">
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