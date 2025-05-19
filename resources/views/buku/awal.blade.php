
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Perpustakaan Digital - Politeknik Negeri Medan</title>
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
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                <h1>Perpustakaan Digital Politeknik Negeri Medan</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                        <form action="{{ route('buku.search') }}" method="GET" class="d-flex align-items-center">
                            <input type="text" name="query" placeholder="Cari buku..." class="form-control me-2">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </li>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ route('buku.index') }}">Daftar Buku</a></li>
                    <li class="dropdown">
                        <a href="#"><span>Kategori</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="#">Teknologi</a></li>
                            <li><a href="#">Sains</a></li>
                            <li><a href="#">Bisnis</a></li>
                            <li><a href="#">Pendidikan</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main id="main">
        <!-- Hero Section -->
        <section class="hero-section" style="margin-top: 100px;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start">
                        <h1 class="display-4 mb-4">Selamat Datang di Perpustakaan Digital</h1>
                        <p class="lead mb-4">Temukan ribuan koleksi buku digital untuk menunjang pembelajaran Anda.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Books Section -->
        <section class="featured-books py-5">
            <div class="container">
                <h2 class="text-center mb-4">Buku Terbaru</h2>
                <div class="row">
                    @foreach($buku as $b)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            @if($b->gambar_cover)
                            <img src="{{ asset('imgCover/'.$b->gambar_cover) }}" 
                                 class="card-img-top" 
                                 alt="{{ $b->judul }}"
                                 style="height: 250px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $b->judul }}</h5>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Penulis: {{ $b->penulis }}<br>
                                        Penerbit: {{ $b->penerbit }}
                                    </small>
                                </p>
                                <p class="card-text">{{ Str::limit($b->ringkasan, 100) }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-top-0">
                                <a href="#" class="btn btn-primary btn-sm">Detail</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer id="footer" class="footer">
        <div class="footer-legal">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <div class="copyright">
                            © {{ date('Y') }} <strong><span>Perpustakaan Digital</span></strong>. All Rights Reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Vendor JS Files -->
    <script src="{{ asset('ZenBlog/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('ZenBlog/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('ZenBlog/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('ZenBlog/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('ZenBlog/assets/js/main.js') }}"></script>
</body>
</html>