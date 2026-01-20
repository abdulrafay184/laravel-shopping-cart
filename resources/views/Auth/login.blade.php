<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Background - light blue gradient */
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #d9f0ff, #ffffff);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }

    /* Ring container */
    .ring {
      position: relative;
      width: 400px;
      height: 500px;
      display: flex;
      justify-content: center;
      align-items: center;
      background: rgba(255,255,255,0.55);
      border-radius: 20px;
      backdrop-filter: blur(12px);
      box-shadow: 0 15px 40px rgba(0,0,0,0.2);
      overflow: hidden;
      animation: floatForm 2.5s ease-in-out infinite alternate;
    }

    /* Floating circles / ring animations */
    .ring i {
      position: absolute;
      display: block;
      width: 150px;
      height: 150px;
      border-radius: 50%;
      background: var(--clr);
      animation: animateRing 4s linear infinite;
      opacity: 0.15;
    }

    .ring i:nth-child(2){ animation-delay: 1s; }
    .ring i:nth-child(3){ animation-delay: 2s; }

    @keyframes animateRing{
      0%{ transform: translateY(0) rotate(0deg) scale(1);}
      50%{ transform: translateY(-40px) rotate(180deg) scale(1.2);}
      100%{ transform: translateY(0) rotate(360deg) scale(1);}
    }

    @keyframes floatForm{
      0%{ transform: translateY(0px); }
      50%{ transform: translateY(-10px); }
      100%{ transform: translateY(0px); }
    }

    /* Login box */
    .login {
      position: relative;
      width: 80%;
      padding: 40px;
      background: rgba(173,216,230,0.45); /* half white / light blue */
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.25);
      backdrop-filter: blur(12px);
      z-index: 10;
      display: flex;
      flex-direction: column;
      align-items: center;
      animation: fadeIn 1.2s ease forwards;
    }

    .login h2 {
      color: #007bff;
      font-weight: 700;
      letter-spacing: 2px;
      margin-bottom: 30px;
      text-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    .inputBx {
      width: 100%;
      margin-bottom: 20px;
      position: relative;
      transition: 0.4s;
    }

    .inputBx input[type="text"],
    .inputBx input[type="password"] {
      width: 100%;
      padding: 14px 20px;
      border-radius: 12px;
      border: none;
      outline: none;
      background: rgba(255,255,255,0.6);
      color: #000;
      font-size: 16px;
      box-shadow: inset 0 0 10px rgba(0,0,0,0.1);
      transition: all 0.4s ease;
    }

    .inputBx input[type="text"]:focus,
    .inputBx input[type="password"]:focus {
      background: rgba(255,255,255,0.8);
      box-shadow: 0 0 12px #00aaff, 0 0 20px #007bff;
      transform: translateY(-2px);
    }

    .inputBx input[type="submit"] {
      width: 100%;
      padding: 14px 0;
      border-radius: 12px;
      border: none;
      outline: none;
      background: linear-gradient(135deg,#00aaff,#80dfff);
      color: #fff;
      font-weight: bold;
      cursor: pointer;
      font-size: 18px;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
      animation: btnPulse 2s infinite;
    }

    .inputBx input[type="submit"]:hover {
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 12px 25px rgba(0,0,0,0.35), 0 0 20px #00aaff, 0 0 20px #80dfff;
    }

    @keyframes btnPulse{
      0%{ box-shadow:0 8px 20px rgba(0,0,0,0.2); }
      50%{ box-shadow:0 12px 25px rgba(0,0,0,0.35), 0 0 25px #00aaff, 0 0 25px #80dfff; }
      100%{ box-shadow:0 8px 20px rgba(0,0,0,0.2); }
    }

    .links {
      display: flex;
      justify-content: space-between;
      width: 100%;
      margin-top: 15px;
    }

    .links a {
      position: relative;
      text-decoration: none;
      color: #007bff;
      font-weight: 600;
      transition: 0.3s;
    }

    .links a::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      left: 0;
      bottom: -3px;
      background-color: #007bff;
      transition: width 0.3s ease;
    }

    .links a:hover {
      color: #00aaff;
    }

    .links a:hover::after {
      width: 100%;
      background: #00aaff;
    }

    @keyframes fadeIn{
      from { opacity:0; transform: translateY(20px);}
      to { opacity:1; transform: translateY(0);}
    }

  </style>
</head>
<body>
  <form action="{{route('userlogin')}}" method="post">
    @csrf
    <div class="ring">
      <i style="--clr:#00aaff;"></i>
      <i style="--clr:#80dfff;"></i>
      <i style="--clr:#ffffff;"></i>

      <div class="login">
        <h2>Login</h2>

        @if (session('error'))
        <div class="alert alert-danger w-100 text-center" role="alert">
          {{ session('error') }}
        </div>
        @endif

        <div class="inputBx">
          <input type="text" placeholder="Usermail" name='email'>
          @error('email')
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
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
