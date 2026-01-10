@extends('Admin.sidebar')

@section('admin')
<<<<<<< HEAD
<div class="container">
=======
<form action="{{ route('userupdate', $user->id) }}" method="POST">
    @csrf

<div class="container mt-4">
>>>>>>> 0ca455b6c1b1abed189b1e17f28a54106e834a51
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6">
<<<<<<< HEAD

            <div class="edit-user-form-container mt-5">
                <h2 class="form-title">Edit User</h2>
                <p class="form-subtitle text-muted text-center">Update user information easily</p>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('userupdate', $user->id) }}" method="POST" class="animated-form">
                    @csrf

                    <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="animated-input">
                    </div>

                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" name="mail" value="{{ $user->mail }}" class="animated-input">
                    </div>

                    <div class="form-group mb-3">
                        <label>Role</label>
                        <input type="text" name="role" value="{{ $user->role }}" class="animated-input">
                    </div>

                    <button type="submit" class="animated-btn w-100">Update User</button>
                </form>
            </div>

=======
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
>>>>>>> 0ca455b6c1b1abed189b1e17f28a54106e834a51
        </div>

        <div class="col-md-3"></div>
    </div>
</div>

<<<<<<< HEAD
<style>
/* ===== Form Container ===== */
.edit-user-form-container {
    background: linear-gradient(145deg, #ffffff, #eaf4ff);
    padding: 35px 30px;
    border-radius: 18px;
    box-shadow: 0 30px 70px rgba(0,123,255,0.25);
    position: relative;
    animation: formFadeScale 1.2s ease forwards;
    opacity: 0;
    transform: translateY(50px) scale(0.95);
}

/* Top Gradient Line */
.edit-user-form-container::before {
    content: "";
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 5px;
    background: linear-gradient(90deg, #4facfe, #00f2fe);
    border-radius: 18px 18px 0 0;
    animation: glowLine 2s infinite alternate;
}

/* Form Title & Subtitle */
.form-title {
    font-size: 2rem;
    font-weight: 800;
    color: #007bff;
    letter-spacing: 2px;
    text-transform: uppercase;
    animation: floatTitle 3s ease-in-out infinite;
    margin-bottom: 10px;
    text-align: center;
}

.form-subtitle {
    font-size: 1rem;
    margin-bottom: 25px;
}

/* Inputs */
.animated-input {
    width: 100%;
    background: #fff;
    border: 2px solid #cfe2ff;
    border-radius: 12px;
    padding: 14px;
    font-size: 0.95rem;
    transition: all 0.35s ease, transform 0.35s ease;
}

.animated-input:focus {
    border-color: #007bff;
    box-shadow: 0 0 18px rgba(0,123,255,0.45);
    transform: translateY(-3px);
}

/* Button */
.animated-btn {
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    color: #fff;
    padding: 14px;
    font-size: 16px;
    font-weight: 700;
    border: none;
    border-radius: 30px;
    letter-spacing: 2px;
    cursor: pointer;
    box-shadow: 0 12px 30px rgba(0,123,255,0.45);
    animation: pulse 2s infinite;
    transition: all 0.3s ease, transform 0.3s ease;
}

.animated-btn:hover {
    transform: translateY(-4px) scale(1.07);
    box-shadow: 0 20px 45px rgba(0,123,255,0.65);
}

/* ===== Animations ===== */
@keyframes formFadeScale {
    to { opacity: 1; transform: translateY(0) scale(1); }
}

@keyframes glowLine {
    from { opacity: 0.5; }
    to { opacity: 1; }
}

@keyframes floatTitle {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-6px); }
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 rgba(0,123,255,0.4); }
    50% { box-shadow: 0 0 28px rgba(0,123,255,0.7); }
    100% { box-shadow: 0 0 0 rgba(0,123,255,0.4); }
}

/* Responsive */
@media(max-width: 768px) {
    .form-title { font-size: 1.7rem; }
    .edit-user-form-container { padding: 25px 20px; }
}
</style>
=======
>>>>>>> 0ca455b6c1b1abed189b1e17f28a54106e834a51
@endsection
