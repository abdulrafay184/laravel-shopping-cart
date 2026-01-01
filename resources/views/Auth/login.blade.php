<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="style/login.css">
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
@endif;
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
    <div class="links">
      <a href="#">Forget Password</a>
      <a href="{{route('registerpage')}}">Signup</a>
    </div>
  </div>
</div>
<!--ring div ends here-->
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
