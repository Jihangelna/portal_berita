@extends('layouts.app')
@section('content')


<div class="container">
    <div class="container-fluid">
        <h4 class="font-weight-bold text-center text-uppercase">Data Admin</h4>
        <a href="{{ route('admin.create') }}"
            class="btn btn-outline-dark font-weight-bold btn-sm mb-3 mr-3 text-uppercase ">
            Create </a>
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
                                <th>Nama</th>
                                <th>Email</th>
                                {{-- <th>Password</th>  --}}
                                <th class="col-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $row)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $row->name }}</td>
                                <td class="align-middle">{{ $row->email }}</td>
                                {{-- <td class="align-middle">{{ $row->password }}</td> --}}
                                <td class="align-middle">
                                    <a href="{{ url('users/'.$row->id.'/edit') }}" class="btn btn-outline-dark btn-sm mr-1"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="{{ url('users/hapus/'. $row->id) }}" class="btn btn-outline-dark btn-sm"><i class="bi bi-trash-fill"></i></a>
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
