@extends('layouts.main')
@section('title', 'Book Category')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div>
            <h1 class="h3 mb-2 text-gray-800 d-flex justify-content-between">Kategori Buku</h1>
            <div class="d-flex justify-content-end">
                <a href="/category-deleted" class="btn btn-sm btn-secondary ml-3 mb-3 ">
                    <i class="fas fa-list-ul"></i>
                    Lihat Data Terhapus
                </a>
                <a href="/category-add" class="btn btn-sm btn-primary ml-3 mb-3">
                    <i class="fas fa-plus"></i>
                    Tambah Kategori
                </a>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="mt-2">
                    @if (session()->has('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="table-responsive p-0">
                    <!-- DataTables : Tables Books -->
                    <table class="table table-stripped table-hover datatab">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="/category-edit/{{ $item->slug }}"
                                            class="btn btn-primary btn-sm font-weight-bold">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="/category/{{ $item->slug }}"
                                            onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- DataTables : Tables Books Close -->
                </div>
            </div>
        </div>

    </div>
@endsection
