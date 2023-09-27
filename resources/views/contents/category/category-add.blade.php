@extends('layouts.main')
@section('title', 'Tambah Kategori Buku')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Kategori Buku</h1>

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

        <!-- Create Category -->
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
                        <form action="/category-add" method="post">
                            @csrf
                            {{-- Create Name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('npm') is-invalid @enderror" placeholder="Nama Kategori"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary" type="submit">Save</button>
                            <a href="/categories" class="btn btn-primary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
