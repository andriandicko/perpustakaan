@extends('layouts.main')
@section('title', 'Log Transactions')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div>
            <h1 class="h3 mb-3 text-gray-800 d-flex justify-content-between">Log Transaction List</h1>
            {{-- <div class="d-flex justify-content-end">
                <a href="/user-banned" class="btn btn-sm btn-secondary ml-3 mb-3 ">
                    <i class="fas fa-list-ul"></i>
                    View Banned User
                </a>
                <a href="/registered-users" class="btn btn-sm btn-primary ml-3 mb-3">
                    <i class="fas fa-user-lock"></i>
                    New Registered User
                </a>
            </div> --}}
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                {{-- @if (session()->has('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif --}}
                <div class="table-responsive p-0">
                    <x-log-transaction-table :log='$LogTransaction' />
                </div>
            </div>
        </div>

    </div>
@endsection
