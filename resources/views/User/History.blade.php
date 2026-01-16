@extends('User.Sidebar')
@section('website')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2 mt-5 text-center">
            <h1>User History</h1>
            <table class='table mt-5'>
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Order Time</th>
                </tr>
                @foreach ($data as $Orders)
                <tr>
                    <td>{{ $Orders->id }}</td>
                    <td>{{ $Orders->Users->name }}</td>
                    <td>{{ $Orders->products->Name }}</td>
                    <td>{{ $Orders->quantity }}</td>
                    <td>{{ $Orders->created_at }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
