@extends('User.Sidebar')

@section('title', 'Contact Us')

@section('website')
<div class="container mt-5">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    {{-- Google Map --}}
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-center mb-3">Our Location</h2>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.019809258564!2d-122.4194150846818!3d37.77492927975944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c12345678%3A0x123abc456def7890!2sYour%20Location!5e0!3m2!1sen!2sus!4v1234567890"
                width="100%" height="400" style="border:0; border-radius:10px;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>

    {{-- Contact Form --}}
    <div class="row mb-5">
        <div class="col-lg-7 mx-auto">
            <h4>Send Message</h4>

            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf {{-- CSRF token for security --}}

                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                           value="{{ Auth::check() ? Auth::user()->name : old('name') }}" required>
                </div>

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Your Email"
                           value="{{ Auth::check() ? Auth::user()->email : old('email') }}" required>
                </div>

                <div class="mb-3">
                    <input type="text" name="subject" class="form-control" placeholder="Issue"
                           value="{{ old('subject') }}" required>
                </div>

                <div class="mb-3">
                    <textarea name="message" class="form-control" rows="5" placeholder="Your Message" required>{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Send Message</button>
            </form>
        </div>
    </div>

    {{-- View Messages Button --}}
    <div class="row mt-4">
        <div class="col-12 text-center">
            <a href="{{ route('user.messages') }}" class="btn btn-success btn-lg mb-4">
                Your Messages
            </a>
        </div>
    </div>

</div>

{{-- Styling --}}
<style>
    h4 { font-weight: 600; margin-bottom: 20px; }
    .btn-primary { background-color: #0d6efd; border-color: #0d6efd; }
    .btn-primary:hover { background-color: #0b5ed7; border-color: #0a58ca; }
    .btn-success { background-color: #198754; border-color: #198754; color: #fff; }
    .btn-success:hover { background-color: #157347; border-color: #146c43; color: #fff; }
    .form-control { border-radius: 6px; padding: 10px 12px; font-size: 14px; }
</style>
@endsection
