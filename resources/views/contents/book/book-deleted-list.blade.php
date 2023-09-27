@extends('layouts.main')
@section('title', 'List Buku Terhapus')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div>
            <h1 class="h3 mb-2 text-gray-800 d-flex justify-content-between">Data Kategori Buku Terhapus</h1>
            <div class="d-flex justify-content-end">
                <a href="/categories" class="btn btn-sm btn-primary ml-3 mb-3">
                    <i class="fas fa-angle-left"></i>
                    Kembali
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
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($deletedBooks as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->book_code }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @foreach ($item->categories as $category)
                                            {{ $category->name }},
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="/book-restore/{{ $item->slug }}"
                                            class="btn btn-primary btn-sm font-weight-bold">
                                            <i class="fas fa-trash-restore"></i>
                                            Restore
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
