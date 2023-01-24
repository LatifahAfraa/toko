@extends('base')
@section('content')

    <div class="col-xl-12 col-lg-12 col-sm-12 mt-2">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <center><h3>List User</h3></center>
                <table class="example display">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Email User</th>
                            <th width="19%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($user as $item)
                            <tr class="text-center">
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-sm shadow btn-warning">
                                                <i class="flaticon-381-edit"></i>
                                                Edit</a>
                                        </div>
                                        <div class="col">
                                            <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm shadow btn-danger">
                                                <i class="flaticon-381-trash"></i>
                                                Hapus</button>
                                        </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
