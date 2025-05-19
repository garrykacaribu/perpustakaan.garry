<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Perpustakaan Suka Suka</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('ZenBlog/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('ZenBlog/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('ZenBlog/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('ZenBlog/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('ZenBlog/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{ asset('ZenBlog/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('ZenBlog/assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="{{ asset('ZenBlog/assets/css/variables.css')}}" rel="stylesheet">
  <link href="{{ asset('ZenBlog/assets/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ZenBlog
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ url('/login') }}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Loginnya Di sini..</h1><br>
       
      </a>

      
    </div>
  </header><!-- End Header -->

<!-- Main -->
<main id="main">
    <div class="container">
      <h1 style="text-align: center">Daftar Buku Perpustakaan Digital Politeknik Negeri Medan</h1>
  
      @if ($buku->isEmpty())
        <p class="text-center">Belum ada buku yang terdaftar.</p>
      @else
        <div class="row">
          @foreach ($buku as $data)
            <div class="col-md-4">
              <div class="card mb-4 position-relative">
                <div class="card-badge position-absolute bg-primary text-white px-3 py-2 rounded-pill">
                  {{ $data->genre }}
                </div>
                <img src="{{ asset('imgCover/' . $data->gambar_cover) }}" class="card-img-top" alt="Gambar Cover" style="height: 450px">
                <div class="card-body">
                  <h5 class="card-title">{{ $data->judul }}</h5>
                  <p class="card-text">Penulis: {{ $data->penulis }}</p>
                  <p class="card-text">Penerbit: {{ $data->penerbit }}</p>
                  <p class="card-text">Tahun Terbit: {{ $data->tahun_terbit }}</p>
                  <p class="card-text">ISBN: {{ $data->isbn }}</p>
                  <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $data->ringkasan }}">Ringkasan Buku</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </main>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ringkasan Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Isi ringkasan buku di sini -->
          <p class="card-text"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

    <!-- Footer -->
    <footer id="footer" class="footer">
        <div class="footer-legal">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <div class="copyright">
                  © Copyright <strong><span>Praktikum - Garry Nicholin Kacaribu</span></strong>. 2025
                </div>
                <div class="credits">
                  <!-- All the links in the footer should remain intact. -->
                  <!-- You can delete the links only if you purchased the pro version. -->
                  <!-- Licensing information: https://bootstrapmade.com/license/ -->
                  <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script>
  var exampleModal = document.getElementById('exampleModal');
  exampleModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var ringkasan = button.getAttribute('data-id');
    var modalBody = exampleModal.querySelector('.modal-body p');
    modalBody.textContent = ringkasan;
  });
</script>



    </body>
</html>
