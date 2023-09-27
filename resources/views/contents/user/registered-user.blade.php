@extends('layouts.main')
@section('title', 'Registered Users')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div>
            <h1 class="h3 mb-2 text-gray-800 d-flex justify-content-between">New Registered Users List</h1>
            <div class="d-flex justify-content-end">
                <a href="/users" class="btn btn-sm btn-success ml-3 mb-3">
                    <i class="fas fa-users"></i>
                    Approved Users
                </a>
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
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive p-0">
                    <!-- DataTables : Tables Users -->
                    <table class="table table-stripped table-hover datatab">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                {{-- <th>Role</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($registeredUsers as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->username }}</td>
                                <td>
                                    @if ($item->phone)
                                        {{ $item->phone }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="/user-detail/{{ $item->slug }}" class="btn btn-info btn-sm font-weight-bold">
                                        <i class="fas fa-user-edit"></i>
                                        {{-- Detail --}}
                                    </a>
                                    |
                                    <a href="/user-approve/{{ $item->slug }}"
                                        onclick="return confirm('Apakah Anda Yakin Mengaktifkan User?');"
                                        class="btn btn-success btn-sm">
                                        <i class="fas fa-user-plus"></i>
                                        {{-- Ban User --}}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- DataTables : Tables Users Close -->
                </div>
            </div>
        </div>

    </div>
@endsection
