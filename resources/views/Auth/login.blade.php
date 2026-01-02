
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="style/login.css">
  <style>
    /* Animated Signup link */
    .links a {
      position: relative;
      text-decoration: none;
      color: #3498db;
      font-weight: bold;
      transition: 0.3s;
    }

    .links a::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      left: 0;
      bottom: -2px;
      background-color: #3498db;
      transition: width 0.3s ease;
    }

    .links a:hover {
      color: #2980b9;
    }

    .links a:hover::after {
      width: 100%;
    }

    /* Optional spacing */
    .links {
      display: flex;
      justify-content: space-between;
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <form action="{{route('userlogin')}}" method="post">
    @csrf
    <!--ring div starts here-->
    <div class="ring">
      <i style="--clr:#00ff0a;"></i>
      <i style="--clr:#ff0057;"></i>
      <i style="--clr:#fffd44;"></i>
      <div class="login">
        <h2>Login</h2>

        @if (session('error'))
        <div class="alert alert-danger" role="alert">
          {{ session('error') }}
        </div>
        @endif

        <div class="inputBx">
          <input type="text" placeholder="Usermail" name='mail'>
          @error('mail')
            <p style='color:red;'>{{ $message }}</p>
          @enderror
        </div>

        <div class="inputBx">
          <input type="password" placeholder="Password" name='password'>
          @error('password')
            <p style='color:red;'>{{ $message }}</p>
          @enderror
        </div>

        <div class="inputBx">
          <input type="submit" value="Login">
        </div>

        <!-- Links with animated underline -->
        <div class="links">
          <a href="#">Forget Password</a>
          <a href="{{route('registerpage')}}">Signup</a>
        </div>

      </div>
    </div>
    <!--ring div ends here-->
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
