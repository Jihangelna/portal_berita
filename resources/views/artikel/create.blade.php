@extends('layouts.app')
@section('content')

<div class="container">
  <div class="container-fluid mb-4">
      <h3 class="font-weight-bold text-center mb-4">Create Data</h3>
      <div class="card">
          <div class="card-body">
                <form method="POST" action="{{ route('artikel.store') }}" class="container col-9 mx-auto" enctype="multipart/form-data">
                    @csrf
                    @error('gambar_artikel') 
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div>
                                The image slide must be a file of type: png, jpg, jpeg.
                            </div>
                          </div>
                    @enderror
                    <div class="mb-3">
                      <label for="judul" class="form-label ml-1">Judul Artikel</label>
                      <input type="text" name="judul" class="form-control" id="text">
                    </div>
                    <div class="mb-3">
                      <label for="judul" class="form-label ml-1">slug</label>
                      <input type="text" name="slug" class="form-control" id="text">
                    </div>
                    <div class="mb-3">
                      <label for="body" class="form-label ml-1">Isi Konten</label>
                      <textarea name="body" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="kategori" class="form-label ml-1">Kategori</label>
                      <select name="kategori_id" class="form-control">
                      @foreach ($kategori as $row)
                          <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                      @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="gambar_artikel" class="form-label ml-1">Gambar Artikel</label>
                      <input type="file" name="gambar_artikel" class="form-control">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-outline-dark btn-sm font-weight-bold rounded">save</button>
                    <a href="{{ route('artikel.index') }}" class="btn btn-outline-dark font-weight-bold btn-sm rounded">Kembali</a>
                    </div>
                  </form>
                </div>
              </div>
          </div>
      </div>
@endsection
