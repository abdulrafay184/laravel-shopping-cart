{{-- @extends('Admin.sidebar')
@section('admin')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="col-md-8 offset-2 mt-5">
            <table class='table'>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Picture</th>
                    <th>Amount</th>
                    <th>Actions</th>
                </tr>
                @foreach ($fatch as $data )
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->Name }}</td>
                    <td>{{ $data->Description }}</td>
                    <td><img src="{{ url('storage/course/'.$data->Picture) }}" width="100px" height="50px"></td>
                    <td>{{ $data->Amount }}</td>
                    <td><a href="">Edit</a> ||
                    <a href="{{ route('deletecourse',$data->id) }}">Delete</a>
                    </td>

                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection --}}
