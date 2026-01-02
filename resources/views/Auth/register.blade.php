<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="style/register.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    /* Animated login link */
    .login-link {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      color: #3498db;
      font-weight: bold;
      position: relative;
      transition: 0.3s;
    }

    /* Underline animation on hover */
    .login-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      left: 0;
      bottom: -3px;
      background-color: #3498db;
      transition: width 0.3s ease;
    }

    .login-link:hover {
      color: #2980b9;
    }

    .login-link:hover::after {
      width: 100%;
    }

    /* Optional: center under the form */
    .login-link-wrapper {
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <form action="{{route('userregister')}}" method="POST">
      @csrf
      <h1>Registration</h1>

      <div class="input-box">
        <input type="text" placeholder="Enter User name" name="name"/>
        <i class='bx bxs-user'></i>
        @error('name')
          <p style="color:red;">{{$message}}</p>
        @enderror
      </div>

      <div class="input-box">
        <input type="text" placeholder="User email" name="mail"/>
        <i class='bx bxs-user'></i>
        @error('mail')
          <p style="color:red;">{{$message}}</p>
        @enderror
      </div>

      <div class="input-box">
        <input type="password" placeholder="Password" name="password"/>
        <i class='bx bxs-lock-alt'></i>
        @error('password')
          <p style="color:red;">{{$message}}</p>
        @enderror
      </div>

      <div class="remember-forgot">
        <label>
          <input type="checkbox">
          Remember me
        </label>
        <a href="#"> Forgot Password?</a>
      </div>

      <button type="submit" class="btn">Register</button>

      <!-- Animated login link -->
      <div class="login-link-wrapper">
        <a href="{{ route('loginpage') }}" class="login-link">Already have an account? Login</a>
      </div>
    </form>
  </div>
</body>
</html>
