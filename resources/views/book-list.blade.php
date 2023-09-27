@extends('layouts.main')
@section('title', 'Books List')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div>
            <h1 class="h3 mb-2 text-gray-800 d-flex justify-content-between">List Buku</h1>
        </div>
        <form action="" method="get">
            <div class="row">
                <div class="col-12 col-sm-6 mb-3">
                    <select name="category" id="category" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-6 mb-3">
                    <div class="input-group ">
                        <input type="text" class="form-control" name="title" placeholder="Search Book's Title">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    @foreach ($books as $item)
                        <div class="card col-lg-3 col-md-4 col-sm-6 mb-3 p-2" style="width: 18rem;">
                            <img draggable="false"
                                src="{{ $item->cover != null ? asset('storage/cover/' . $item->cover) : asset('images/cover_not_found.png') }}"
                                class="card-img-top" alt="..." style="height: 300px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{ $item->book_code }}</h5>
                                <p class="card-text">{{ $item->title }}</p>
                                <p
                                    class="card-text text-right font-weight-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                                    {{ $item->status }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
