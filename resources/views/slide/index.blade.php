@extends('layouts.app')
@section('content')


<div class="container">
    <div class="container-fluid">
        <h4 class="font-weight-bold text-primary text-center text-uppercase">Data Artikel</h4>
        <a href="{{ route('slide.create') }}"
            class="btn btn-primary font-weight-bold btn-sm ml-auto rounded-lg col-2 mb-3 mr-3 text-uppercase">tambah
            slide</a>
        <div class="card mb-4">
            <div class="card-body shadow">
                <div class="table-responsive-lg">
                    <table class="table table-bordered text-center">
                        <thead class="text-white bg-primary text-uppercase">
                            <tr>
                                <th>No</th>
                                <th>judul</th>
                                <th>gambar</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($data as $row)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->judul_slide }}</td>
                                <td><img src="{{ asset('storage/' . $row->gambar_slide) }}" alt="gambar_slide"
                                        width="200"></td>
                                <td>
                                    <a href="{{ url('slide/hapus/'. $row->id) }}"
                                        class="btn btn-outline-primary btn-sm"><i class="bi bi-trash-fill"></i></a>
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
