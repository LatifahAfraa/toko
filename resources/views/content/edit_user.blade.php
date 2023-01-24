@extends('base')
@section('content')

<div class="col-xl-12 col-lg-12 col-sm-12 mt-2">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
           <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        @method('put')

        <center><h3>Edit User</h3></center>
        <div class="form-group row mb-1">
            <label for="name" class="col-sm-2 col-form-label">Nama User</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
        </div>

        <div class="form-group row mb-1">
            <label for="email" class="col-sm-2 col-form-label">Email User</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>
        </div>

        <div class="form-group row mb-1">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" placeholder="Isi password jika ingin ganti password">
            </div>
        </div>


        <button type="submit" class="btn btn-success float-end mt-2">Simpan</button>


        </form>
        </div>
    </div>
</div>
@endsection
