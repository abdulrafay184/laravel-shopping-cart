@extends('Admin.sidebar');

@section('admin')

<div class="container">

    <div class="row">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center">

            <table class="table mt-4">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mail</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>

            @foreach ($alluser as $users)
                <tr>
                    <td>{{ $users->id}}</td>
                    <td>{{ $users->name}}</td>
                    <td>{{ $users->mail}}</td>
                    <td>{{ $users->role}}</td>
                    <td>
                       [ <a href="">Edit</a> || <a href="{{ route('userdelete',$users->id) }}">Delete</a> ]
                    </td>
                </tr>
            @endforeach
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection

{{-- {{ route('userdelete',$users->id) }} --}}
