@extends('layouts.main')
@section('title', 'Transaction')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div>
            <h1 class="h3 mb-3 text-gray-800 d-flex justify-content-between">Transaction</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body" style="height: 450px;">
                <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3 mt-5">
                    <h3 class="mb-3 text-center">Book Transaction</h3>

                    {{-- Alert // diambil dari Contoller store --}}
                    @if (session('message'))
                        <div class="alert {{ session('alert-class') }}">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form action="transaction" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="user" class="form-label">User</label>
                            <select name="user_id" id="user" class="form-control select-multiple">
                                <option value="">Select User</option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="book" class="form-label">Book</label>
                            <select name="book_id" id="book" class="form-control select-multiple">
                                <option value="">Select Book</option>
                                @foreach ($books as $item)
                                    <option value="{{ $item->id }}">{{ $item->book_code }} {{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
