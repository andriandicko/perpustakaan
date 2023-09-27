@extends('layouts.main')
@section('title', 'Books List')
@section('page-name', 'dashboard')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div>
            <h1 class="h3 mb-2 text-gray-800 d-flex justify-content-between">List Buku</h1>
            <div class="d-flex justify-content-end">
                <a href="/book-deleted" class="btn btn-sm btn-secondary ml-3 mb-3 ">
                    <i class="fas fa-list-ul"></i>
                    Lihat Data Terhapus
                </a>
                <a href="/book-add" class="btn btn-sm btn-primary ml-3 mb-3">
                    <i class="fas fa-folder-plus"></i>
                    Tambah Buku
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
                </div>
                @endif
                <div class="table-responsive p-0">
                    <!-- DataTables : Tables Books -->
                    <table class="table table-stripped table-hover datatab">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Code</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($books as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->book_code }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @foreach ($item->categories as $category)
                                            {{ $category->name }},
                                        @endforeach
                                    </td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <div class="d-flex" style="text-wrap: nowrap;">
                                            <a href="/book-edit/{{ $item->slug }}" class="btn btn-primary btn-sm font-weight-bold mx-1">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            <a href="/book/{{ $item->slug }}" style="text-wrap: nowrap;"
                                                onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                                class="btn btn-danger btn-sm mx-1">
                                                <i class="fa fa-trash"></i>
                                                Hapus
                                            </a>
                                        </div>
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
