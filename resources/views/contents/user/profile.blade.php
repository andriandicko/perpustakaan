@extends('layouts.main')

@section('title', 'Profile')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body row ">
            <div class="col-lg-4 p-3 border border-secondary">
                <h3 class="text-center font-weight-bold">Profile</h3>

            </div>
            <div class="table-responsive p-0 col-lg-8 p-3 border border-secondary">
                <h3 class="text-center font-weight-bold">Your's Log Transaction</h3>
                <x-log-transaction-table :log='$LogTransaction' />
            </div>
        </div>
    </div>
@endsection
