@extends('layouts.app')
@section('content')

<div class="container">
  <div class="container-fluid mb-4">
      <h3 class="font-weight-bold text-center mb-4">Create Data</h3>
      <div class="card">
          <div class="card-body">
                <form method="POST" action="{{ route('kategori.store') }}" class="conteiner col-9 mx-auto">
                    @csrf
                    <div class="mb-3">
                      <label for="kategori" class="form-label ml-1 fs-5">Nama Kategori</label>
                      <input type="text" name="nama kategori" class="form-control" id="text">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-outline-dark btn-sm font-weight-bold rounded">save</button>
                    <a href="{{ route('kategori.index') }}" class="btn btn-outline-dark font-weight-bold btn-sm rounded">Kembali</a>
                    </div>
                  </form>
               </div>
            </div>
        </div>
    </div>
  </div>
@endsection
