@extends('Admin.sidebar')

@section('admin')
<form action="{{ route('userupdate', $user->id) }}" method="POST">
    @csrf

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6">
            <h3 class="text-center">Edit User</h3>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('userupdate', $user->id) }}" method="POST">
                @csrf

                <div class="form-group mt-2">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>

                <div class="form-group mt-2">
                    <label>Email</label>
                    <input type="email" name="mail" value="{{ $user->mail }}" class="form-control">
                </div>

                <div class="form-group mt-2">
                    <label>Role</label>
                    <input type="text" name="role" value="{{ $user->role }}" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mt-3 w-100">
                    Update User
                </button>
            </form>
        </div>

        <div class="col-md-3"></div>
    </div>
</div>

@endsection
