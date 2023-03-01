@extends('layouts.app')
@section('content')

<div class="container">
    <div class="container-fluid mb-4">
        <h3 class="font-weight-bold text-center mb-4">Update Data</h3>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('artikel.update', $artikel->id) }}" enctype="multipart/form-data"
                    class="form-group">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="judul" class="form-label ml-1">Judul Artikel</label>
                        <input type="text" name="judul" class="form-control" id="text" value="{{ $artikel->judul }}">
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label ml-1">Slug</label>
                        <input type="text" name="slug" class="form-control" id="text" value="{{ $artikel->slug }}">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label ml-1">Isi Konten</label>
                        <textarea class="form-control" name="body">{{ $artikel->body }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label ml-1">Kategori</label>
                        <select name="kategori_id" class="form-control">
                            @foreach ($kategori as $row)
                            @if ($row->id == $artikel->kategori_id)
                            <option value="{{ $row->id }}" selected='selected'>{{ $row->nama_kategori }}
                            </option>
                            @endif
                            <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gambar_artikel" class="form-label ml-1">Gambar Artikel</label>
                        <input type="file" name="gambar_artikel" class="form-control">
                        <br><label for="gambar">Gambar saat ini : </label><br>
                        <img src="{{ asset('storage/' . $artikel->gambar_artikel) }}"
                            alt="{{ $artikel->gambar_artikel }}" width="350">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-outline-dark btn-sm font-weight-bold">save</button>
                        <a href="{{ route('artikel.index') }}"
                            class="btn btn-outline-dark font-weight-bold btn-sm">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
