@extends('layouts.app')
@section('content')


<div class="container">
    <div class="container-fluid">
        <h4 class="font-weight-bold text-center text-uppercase">Data Artikel</h4>
        <a href="{{ route('artikel.create') }}"
            class="btn btn-primary font-weight-bold btn-sm mb-3 mr-3 text-uppercase ">
            Create Artikel</a>
        <div class="card mb-4">
            @if (Session::has('Success'))
            <div class="alert alert-primary">
                {{ Session('Success') }}
            </div>
            @endif
            <div class="card-body shadow">
                <div class="table-responsive-lg">
                    <table class="table table-bordered text-center">
                        <thead class="text-white text-uppercase" style="background-color:#2e4d5b">
                            <tr>
                                <th>No</th>
                                <th>Profil</th>
                                <th>konten</th>
                                <th>Kategori</th>
                                <th>Author</th>
                                <th>Gambar</th>
                                <th>Tgl Buat</th> 
                                <th>Tgl Edit</th>            
                                <th class="col-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikel as $row)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $row->judul }}</td>
                                <td class="align-middle">{{ $row->slug }}</td>
                                <td class="align-middle">{{  Str::limit($row->body, 25)  }}</td>
                                <td class="align-middle">{{ $row->kategori->nama_kategori }}</td>
                                <td class="align-middle">{{ Auth::user()->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $row->gambar_artikel) }}" alt="{{$row->gambar_artikel}}" width="100px">
                                </td>
                                <td class="align-middle">{{ $row->created_at }}</td>
                                <td class="align-middle">{{ $row->updated_at }}</td>
                                <td class="align-middle">
                                    <a href="{{ url('artikel/'.$row->id.'/edit') }}" class="btn btn-outline-primary btn-sm mr-1"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="{{ url('artikel/hapus/'. $row->id) }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
           </div>          
        </div>
    </div>
</div>
</div>
@endsection
