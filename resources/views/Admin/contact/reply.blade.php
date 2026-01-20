@extends('Admin.sidebar')

@section('admin')
<div class="container mt-5">
    <h3>Reply to Message</h3>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>From:</strong> </p>
            <p><strong>Subject:</strong> </p>
            <p><strong>Message:</strong> </p>
        </div>
    </div>

    <form  method="POST">
        @csrf
        <div class="mb-3">
            <label for="reply" class="form-label">Your Reply</label>
            <textarea name="reply" id="reply" rows="5" class="form-control" ></textarea>
        </div>

        <button type="submit" class="btn btn-success">Send Reply</button>
        <a  class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
