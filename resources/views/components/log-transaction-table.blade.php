<div class="table-responsive p-0">

    <!-- DataTables : Tables Users -->
    <table class="table table-stripped table-hover datatab">
        <thead>
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Book</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Actual Return Date</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($log as $item)
                <tr
                    class="{{ $item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'bg-danger text-white' : 'bg-success text-white') }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->username }}</td>
                    <td>{{ $item->book->title }}</td>
                    <td>{{ $item->rent_date }}</td>
                    <td>{{ $item->return_date }}</td>
                    <td>{{ $item->actual_return_date }}</td>
                    {{-- <td>
                        <a href="/user-detail/{{ $item->slug }}" class="btn btn-info btn-sm font-weight-bold">
                            <i class="fas fa-user-edit"></i> --}}
                    {{-- Detail --}}
                    {{-- </a> --}}
                    {{-- | --}}
                    {{-- <a href="/user/{{ $item->slug }}"
                            onclick="return confirm('Apakah Anda Yakin Menghapus User?');"
                            class="btn btn-danger btn-sm">
                            <i class="fas fa-user-slash"></i> --}}
                    {{-- Ban User --}}
                    {{-- </a> --}}
                    {{-- </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- DataTables : Tables Users Close -->
</div>
