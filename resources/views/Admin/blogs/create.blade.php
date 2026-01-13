@extends('Admin.sidebar')

@section('title', 'Create Blog Post')

@section('admin')

<style>
/* Container max width & spacing */
.container {
    max-width: 900px;
    margin-top: 40px;
    margin-bottom: 60px; /* footer ke liye space */
    padding: 20px;
}

/* Heading */
h2 {
    font-weight: 700;
    margin-bottom: 25px;
    color: #111827; /* Dark gray */
}

/* Error Alert */
.alert-danger {
    border-left: 5px solid #dc3545;
    background-color: #fff5f5;
    padding: 15px 20px;
    border-radius: 6px;
}

/* Form Styling */
form {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* Labels */
label {
    font-weight: 500;
    margin-bottom: 8px;
    display: block;
    color: #374151;
}

/* Inputs & Textarea */
.form-control {
    border-radius: 8px;
    padding: 12px 15px;
    font-size: 14px;
    border: 1px solid #d1d5db;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #4f46e5;
    box-shadow: 0 0 0 0.2rem rgba(79,70,229,0.25);
    outline: none;
}

textarea.form-control {
    min-height: 150px;
    resize: vertical;
}

/* Buttons */
.btn-success {
    background-color: #16a34a;
    border-color: #16a34a;
    padding: 12px 25px;
    font-weight: 600;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.btn-success:hover {
    background-color: #15803d;
    border-color: #15803d;
}

/* Image Preview */
#imagePreview {
    margin-top: 10px;
    max-width: 250px;
    max-height: 250px;
    border-radius: 8px;
    border: 1px solid #d1d5db;
    object-fit: cover;
    display: none;
}

/* Responsive */
@media (max-width: 768px) {
    .container {
        padding: 15px;
    }

    form {
        padding: 20px;
    }
}

/* Footer Fix */
footer.footer {
    position: relative; /* page ke niche naturally */
    bottom: 0;
    width: 100%;
    margin-top: 30px;
}
</style>

<div class="container">
    <h2>Create New Blog Post</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="10" required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" id="imageInput">
            <img id="imagePreview" src="#" alt="Image Preview">
        </div>

        <button class="btn btn-success">
            Create Blog
        </button>
    </form>
</div>

<script>
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                imagePreview.setAttribute('src', this.result);
                imagePreview.style.display = 'block';
            });

            reader.readAsDataURL(file);
        } else {
            imagePreview.setAttribute('src', '#');
            imagePreview.style.display = 'none';
        }
    });
</script>

@endsection
