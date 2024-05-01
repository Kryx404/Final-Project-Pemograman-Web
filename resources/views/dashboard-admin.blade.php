<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <!-- css -->
    <link rel="stylesheet" href="" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet" />
  </head>
  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Trash-P</a>
      <button
        class="navbar-toggler position-absolute d-md-none collapsed"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu"
        aria-controls="sidebarMenu"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" />
      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3" href="/">Keluar</a>
        </div>
      </div>
    </header>

    <div class="container-fluid">
      <div class="row">
        <section class="navbar">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                  <span data-feather="home"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="credit-card"></span>
                  Pembayaran
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="archive"></span>
                  Riwayat
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bell"></span>
                  Notifikasi
                </a>
              </li>
            </ul>
          </div>
        </nav>
        </section>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <section class="title">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 fw-semibold">Selamat Datang</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Simpan</button>
              </div>
            </div>
          </div>
        </section>


          <h4>Riwayat</h4>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Jenis Pembayaran</th>
                  <th scope="col">Bukti Pembayaran</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>random</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,001</td>
                  <td>random</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,001</td>
                  <td>random</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,001</td>
                  <td>random</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,001</td>
                  <td>random</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,001</td>
                  <td>random</td>
                  <td>data</td>
                </tr>


              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
      integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
      crossorigin="anonymous"
    ></script>
    <script src="/js/dashboard.js"></script>
  </body>
</html>
