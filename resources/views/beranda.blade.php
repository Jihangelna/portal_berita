<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('', 'TIK HEALTH') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body style="background: linear-gradient(to right, #6ba3a6fa, rgb(218, 244, 255));">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark fw-semibold" style="background-color:#2e4d5b">
        <div class="container">
            <a class="navbar-brand" href="">TIK HEALTH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="beranda">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('dokter') }}">Doctor</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Login
                        </a>
                        <ul class="dropdown-menu">
                            @if (Route::has('login'))
                            @auth
                            <li><a href="{{ url('/') }}"
                                    class="dropdown-item text-sm text-gray-700 dark:text-gray-500">Home</a></li>
                            @else
                            <li><a href="{{ route('login') }}" class="dropdown-item fw-semibold"><i
                                        class="fas fa-sign-in-alt"></i> Log in</a></li>
                            @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="dropdown-item fw-semibold"><i
                                        class="fas fa-pen-square"></i> Register</a></li>
                            @endif
                            @endauth
                            @endif
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner rounded-5 ">
                @foreach ($slide as $key => $row)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $row->gambar_slide) }}" class="img-fluid d-block "
                        alt="{{ $row->gambar_slide }}">
                </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($artikel as $row)
            <div class="col-md-4 mt-4">
                <div class="card h-100 w-100" style="width: auto">
                    <img src="{{ asset('storage/' . $row->gambar_artikel) }}" class="card-img-top" alt="gambar_artikel">
                    <div class="card-body">
                        <button class="btn btn-light text-primary fw-bold" type="button">{{ $row->kategori->nama_kategori }}</button>
                    
                        <h5 class="card-title">
                            <a href=" {{ route('detail_artikel', $row->slug) }}" style="color: black; text-decoration: none;">
                                {{ $row->judul }}
                            </a>
                        </h5>
                            <p class="card-text">{{ Str::limit($row->body, 50) }}</p>
                            <p class="card-text" style="font-size:12px; color: rgba(0, 0, 0, 0.416);">{{ $row->created_at }}</p>
                        
                        </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="footer mt-3" style="background-color:#076685cc">
        <div class="container">
            <div class="copyright text-center">
                <div class="col-md-4">
                   footer
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <footer class="footer mt-3 sticky-footer bg-white fw-bold text-secondary">
        <div class="container">
            <div class="copyright text-center">
                <span>Copyright &copy; 2022 | Take Health</span>
            </div>
        </div>
    </footer> --}}
    <br>
    <footer class="footer mt-3 sticky-footer bg-white fw-bold text-secondary" style="background-color:#2e4d5b" >
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info" >
                <div class="container mt-4">
                    <div class="copyright">
                      &copy; Copyright <strong><span>Impact</span></strong>. All Rights Reserved
                    </div>
                  </div>             
            </div>
          </div>
        </div>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
