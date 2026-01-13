@extends('User.Sidebar')

@section('title', 'My Messages')

@section('website')
<div class="container mt-5">
    <h3 class="mb-4 text-center">My Messages</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if($messages->isEmpty())
        <p class="text-center text-muted">You have not sent any messages yet.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $msg)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $msg->subject }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($msg->message, 50) }}</td>
                        <td class="text-center">{{ $msg->created_at->format('d M Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('user.messages', $msg->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
