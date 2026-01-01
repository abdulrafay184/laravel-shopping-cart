<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/register.css">
</head>
<body>
    <html lang="en">
<head>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <form action="{{route('userregister')}}" method="Post">
      @csrf
      <h1>Registration</h1>
      <div class="input-box">
        <input type="text" placeholder=" Enter User name"  name='name'/>
        <i class='bx bxs-user'></i>
        @error('name')
          <p style='color:red;'>{{$message}}</p>
        @enderror
      </div>
      <div class="input-box">
        <input type="text" placeholder="Usermale"  name='mail'/>
        <i class='bx bxs-user'></i>
        @error('mail')
          <p style='color:red;'>{{$message}}</p>
        @enderror
      </div>
      <div class="input-box">
        <input type="password" placeholder="password" name='password'/>
        <i class='bx bxs-lock-alt'></i>
        @error('password')
          <p style='color:red;'>{{$message}}</p>
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
      <!-- <div class="register-link">
        <p>Don't have an account? <a href="#">Register</a></p>
      </div> -->
    </form>
  </div>
</body>

</html>
</body>
</html>
