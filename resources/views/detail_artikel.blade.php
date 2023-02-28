<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('', 'TIK HEALTH') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body style="background: linear-gradient(to right, #076585, rgb(218, 224, 255));">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark fw-semibold" style="background-color:#076685cc">
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
                        <a href=""  class="nav-link active" aria-current="page">Home</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="container mt-4">
            <div class="row mt-4">

                <div class="col-lg-8 mt-4">
                    <div class="card mb-3 mt-4">
                        <div class="div">
                            <img src="{{ asset('storage/' . $artikel->gambar_artikel) }}" class="card-img-top"
                                alt="{{ $artikel->gambar_artikel }}">
                        </div>
                        <div class="card-body mt-2 p-4">
                            <div class="">
                                <a href="" class="btn btn-sm btn-warning">{{ $artikel->kategori->nama_kategori }}</a>
                                <a href="" class="btn btn-sm btn-primary">{{ $artikel->user->name}}</a>
                            </div>
                            <h2>{{ $artikel->judul }}</h2>
                            <div class="">
                                <p>
                                    {{ $artikel->body  }}
                                </p>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Komentar</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <textarea name="body" class="form-control"></textarea>
                                    </div>
                                    <hr>
                                   <a href="" class="btn btn-secondary">Kirim</a>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
                
                
                <div class="col-lg-4 mt-5">
                    <div class="card mb-3" style="max-width: 23rem;">
                        <div class="card-header">Artikel Terkait</div>
                        <div class="card-body col-mt-4 mb-3" style="max-width: 540px;">
                            
                            <div class="row">
                                @foreach ($kategori as $ktg)
                                <div class="card-body col-mt-4 mb-3" style="width: 20rem;">
                                    <img src="{{ asset('storage/' . $ktg->gambar_artikel) }}" width="100px" class="card-img-top" alt="...">

                                <div class="card-body">
                
                                        <a href=" {{ route('detail_artikel', $ktg->slug) }}" class="text-decoration-none" style="color: black;">
                                            {{ $ktg->judul }}</a>
                                   
                                 </div>
                                </div>
                                
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
</body>

</html>
