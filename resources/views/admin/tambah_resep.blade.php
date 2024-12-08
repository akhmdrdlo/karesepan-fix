
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Karesepan Admin Dashboard</title>
  <link rel="icon" type="image/png" href="../assets/img/white_logo.png">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
  <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
</head>

<body class="g-sidenav-show  bg-gray-100">
  @if(Auth::check())
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <span class="ms-1 text-sm text-dark font-weight-bolder">Karesepan Admin</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark" href="profile">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active bg-gradient-dark text-white" href="resep">
            <i class="material-symbols-rounded opacity-5">table_view</i>
            <span class="nav-link-text ms-1">Tabel Resep</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="profile">
            <i class="material-symbols-rounded opacity-5">person</i>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark " href="#" data-bs-toggle="modal" data-bs-target="#logout">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-symbols-rounded opacity-5">logout</i>
            </div>
            <span class="nav-link-text ms-1">Keluar</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </a>
      </li>
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav ms-md-auto pe-md-3 d-flex  align-items-center  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                {{ Auth::user()->name }}
                <i class="material-symbols-rounded">account_circle</i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="d-flex">
                    <h5 class="mb-0">Tambah Resep Makanan</h5>
                  </div>
                </div>
                <hr>
                <div class="card-body" style="margin-top:-25px;">
                  <form action="/addResep" method="POST" role="form" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label font-weight-bolder">Nama Resep</label>
                        <input class="form-control"  autocomplete="off" type="text" name="nama_makanan" placeholder="Nama Makanan....">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label font-weight-bolder">Deskripsi Singkat Resep</label>
                        <textarea class="form-control" autocomplete="off" type="text" name="deskripsi" placeholder="Berikan deskripsi makanannya..."></textarea>
                      </div>
                    </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <select class="form-control" required name="kat_id" id="kat_id" style="border: 0.75px solid; ">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" >{{ $item->nama_kategori }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="link_gambar">
                              Foto Makanan
                            </label>
                            <input class="form-control" id="link_gambar" name="link_gambar" placeholder="Upload picture" type="file"/>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label font-weight-bolder">Resep Masakan</label>
                        <textarea class="form-control" autocomplete="off" name="resep" placeholder="Apa aja bahan yang dibutuhkan...."></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label font-weight-bolder">Langkah membuat Masakan</label>
                        <textarea class="form-control" autocomplete="off" name="cara_buat" placeholder="Bagaimana cara buatnya...."></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-10">
                        <button class="form-control btn btn-md btn-success col-md-10" type="submit"><i class="fa fa-plus"></i> | TAMBAH RESEP </button>
                      </div>
                      <div class="col-md-2">
                        <a class="form-control btn btn-md btn-danger col-md-2" href="#" data-bs-toggle="modal" data-bs-target="#hapus">
                            <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i> | KEMBALI
                        </a>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <footer class="footer py-4  ">
            <div class="container-fluid">
              <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                  <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                      document.write(new Date().getFullYear())
                    </script>,
                    <i class="fa fa-heart"></i> by
                    <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Karesepan Team</a>
                  </div>
                </div>
              </div>
            </div>
        </footer>
    </div>
  </main>
  <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabelLogout">Upss!!</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apa kamu yakin ingin Logout, {{ Auth::User()->name }} ?</p>
        </div>
        <div class="modal-footer">
          <a href="/logout" class="btn btn-outline-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
  @elseif(!Auth::check())
  <div class="container mt-8">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center">Error 401 - Unauthorized User</div>
          <div class="card-body text-center">
            <h3><i class="fas fa-times-circle text-danger"></i><br>ERROR 401</h3>
            <h3>Oops! Anda tidak memiliki izin untuk mengakses halaman ini.</h3>
            <h6><a href="/signin" class="text-primary">Login </a>sebagai admin untuk mendapatkan izin ke halaman ini!!</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
  <script>
    let table = new DataTable('#tabelku');
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
  <script>
    document.querySelectorAll('textarea').forEach((textarea) => {
      textarea.style.height = 'auto';
      textarea.style.height = textarea.scrollHeight + 'px';
      textarea.addEventListener('input', () => {
          textarea.style.height = 'auto';
          textarea.style.height = textarea.scrollHeight + 'px';
          });
    });
  </script>
</body>

</html>