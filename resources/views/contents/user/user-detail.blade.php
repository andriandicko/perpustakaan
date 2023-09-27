@extends('layouts.main')
@section('title', 'User Detail')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div>
            <h1 class="h3 mb-2 text-gray-800 d-flex justify-content-between">New Registered Users List</h1>
            <div class="d-flex justify-content-end">
                @if($user->status == 'inactive')
                <a href="/registered-users" class="btn btn-sm btn-primary ml-3 mb-3">
                    <i class="fas fa-angle-left"></i>
                    Back
                </a>
                @else
                <a href="/users" class="btn btn-sm btn-primary ml-3 mb-3">
                    <i class="fas fa-angle-left"></i>
                    Back
                </a>
                @endif

                @if($user->status == 'inactive')
                <a href="/user-approve/{{ $user->slug }}" class="btn btn-sm btn-success ml-3 mb-3">
                    <i class="fas fa-user-plus"></i>
                    Approve User
                </a>
                @endif
            </div>
        </div>

        {{-- Alert Status Success --}}
        <div class="mt-2">
            @if (session()->has('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body row">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive p-3 col-lg-3 col-md-6 col-sm-8 border border-secondary">
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control" readonly value="{{ $user->username }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input type="text" class="form-control" readonly value="{{ $user->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control" style="resize: none;" readonly>{{ $user->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Status</label>
                        <input type="text" class="form-control" readonly value="{{ $user->status }}">
                    </div>
                </div>
                <div class="col-lg-9 col-md-6 col-sm-8 p-3 border border-secondary">
                    <h3 class="text-center font-weight-bold">User's Transaction Log</h3>
                    <div class="mt-5">
                        <x-log-transaction-table :log='$LogTransaction' />
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
