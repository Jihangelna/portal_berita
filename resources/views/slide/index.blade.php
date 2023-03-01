@extends('layouts.app')
@section('content')


<div class="container">
    <div class="container-fluid">
        <h4 class="font-weight-bold text-primary text-center text-uppercase">Data Artikel</h4>
        <a href="{{ route('slide.create') }}" class="btn btn-outline-dark font-weight-bold btn-sm mb-3 mr-3 text-uppercase">CREATE</a>
        <div class="card mb-4">
            <div class="card-body shadow">
                <div class="table-responsive-lg">
                    <table class="table table-bordered text-center">
                        <thead class="text-white text-uppercase" style="background-color:#2e4d5b">
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
                                        class="btn btn-outline-dark btn-sm"><i class="bi bi-trash-fill"></i></a>
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
