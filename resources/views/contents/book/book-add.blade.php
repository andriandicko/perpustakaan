@extends('layouts.main')
@section('title', 'Tambah Buku')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Buku</h1>

        {{-- Error Display Message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Create Book List -->
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
                        <form action="book-add" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- Create Book Code --}}
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" name="book_code" id="code"
                                    class="form-control @error('code') is-invalid @enderror" placeholder="Kode Buku"
                                    value="{{ old('book_code') }}">
                                @error('book_code')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Create Book Title --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror" placeholder="Judul Buku"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Create Book Cover --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                {{-- <input type="file" name="cover" class="form-control"> --}}
                                <div class="custom-file ">
                                    <label for="image" class="custom-file-label" for="customFile">Choose file</label>
                                    <input type="file" class="custom-file-input" id="customFile" name="image">
                                </div>
                            </div>

                            {{-- Add Category to Book --}}
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="categories[]" id="category" class="custom-select select-multiple" multiple >
                                    {{-- panggil table categori --}}
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary" type="submit">Save</button>
                            <a href="/books" class="btn btn-primary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
