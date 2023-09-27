@extends('layouts.main')
@section('title', 'Edit Kategori Buku')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Kategori Buku</h1>

        {{-- Error Display --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Create Users -->
        <div class="card shadow mb-4 mt-5">

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        @if (session()->has('success'))
                            <div class="alert alert-success mx-3" role="alert">{{ session('success') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        {{-- Fungsi slash sebelum category-edit itu agar keluar dlu dari category-edit lalu masuk lagi --}}
                        <form action="/category-edit/{{ $category->slug }}" method="post">
                            @csrf

                            {{-- @method diisi sesuai route //update --}}
                            @method('put')

                            {{-- Create Name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('npm') is-invalid @enderror" placeholder="Nama Kategori"
                                    value="{{ $category->name }}">
                                @error('name')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="/categories" class="btn btn-primary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
