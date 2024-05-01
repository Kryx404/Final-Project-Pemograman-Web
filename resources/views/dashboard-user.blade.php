<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>

    <!-- css -->
    <link rel="stylesheet" href="css/dashboard-user.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
 <!-- icon -->
 <link
 rel="stylesheet"
 href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
 integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
 crossorigin="anonymous"
 referrerpolicy="no-referrer"
/>

</head>
<body class="bg-light">

    <div class="container">
      <main>
        <div class="py-5 text-center">
            <i class="fa-solid fa-money-bill fa-2xl"></i>
          <h2>Pembayaran</h2>
          <p class="lead">Masukan Data Pembayaran dengan benar</p>
        </div>

        <div class="row g-5 justify-content-center  ">
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Data Pembayaran</h4>
            <form class="needs-validation" novalidate>
              <div class="row g-3">
                <div class="col-12">
                  <label for="firstName" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>

              <hr class="my-4">

              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="save-info">
                <label class="form-check-label" for="save-info">Ingat informasi untuk lain kali</label>
              </div>

              <hr class="my-4">

              <h4 class="mb-3">Metode Pembayaran</h4>

              <div class="my-3">
                <div class="form-check">
                  <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                  <label class="form-check-label" for="credit">Transfer</label>
                </div>
                <div class="form-check">
                  <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                  <label class="form-check-label" for="debit">Cash</label>
                </div>
                <div class="form-check">
                  <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                  <label class="form-check-label" for="paypal">E-Money</label>
                </div>
              </div>

              <div class="row gy-3">
                <div class="col-12">
                  <label for="cc-name" class="form-label">Nama Rekening</label>
                  <input type="text" class="form-control" id="cc-name" placeholder="" required>
                  <small class="text-muted">Full name as displayed on card</small>
                  <div class="invalid-feedback">
                    Name on card is required
                  </div>
                </div>
              </div>

              <hr class="my-4">

              <button class="w-100 btn btn-primary btn-lg" type="submit">Bayar</button>
            </form>
          </div>
        </div>
      </main>

    </div>
      </body>
</html>
