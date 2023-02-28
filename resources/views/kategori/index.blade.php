@extends('layouts.app')
@section('content')


<div class="container">
    <div class="container-fluid">
        <h4 class="font-weight-bold text-center text-uppercase">Data Kategori</h4>
        <a href="{{ route('kategori.create') }}"
            class="btn btn-primary font-weight-bold btn-sm mb-3 mr-3 text-uppercase ">
            Create Kategori</a>
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
                                <th>Nama Kategori</th>
                                <th class="col-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($kategori as $row)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $row->nama_kategori }}</td>
                                <td>
                                    <a href="{{ url('kategori/'.$row->id.'/edit') }}"
                                        class="btn btn-outline-primary btn-sm mr-1"><i
                                            class="bi bi-pencil-fill"></i></a>
                                    <a href="{{ url('kategori/hapus/'. $row->id) }}"
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
