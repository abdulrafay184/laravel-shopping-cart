<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    /* Dark background with gradient */
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #0d1b2a, #1b263b, #415a77);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Form wrapper */
    .wrapper {
      width: 400px;
      padding: 40px 30px;
      border-radius: 20px;
      background: rgba(255,255,255,0.1); /* half white */
      backdrop-filter: blur(15px);
      box-shadow: 0 15px 40px rgba(0,0,0,0.6);
      animation: floatForm 2.5s ease-in-out infinite alternate;
    }

    h1 {
      text-align: center;
      color: #00aaff;
      margin-bottom: 30px;
      font-weight: 700;
      letter-spacing: 2px;
      text-shadow: 0 2px 10px rgba(0,0,0,0.5);
      animation: floatTitle 3s ease-in-out infinite;
    }

    .input-box {
      position: relative;
      margin-bottom: 20px;
    }

    .input-box input {
      width: 100%;
      padding: 14px 45px 14px 15px;
      border-radius: 12px;
      border: none;
      outline: none;
      background: rgba(255,255,255,0.15);
      color: #fff;
      font-size: 16px;
      box-shadow: inset 0 0 10px rgba(0,0,0,0.3);
      transition: all 0.4s ease;
    }

    .input-box input:focus {
      background: rgba(255,255,255,0.3);
      box-shadow: 0 0 12px #00aaff, 0 0 20px #80dfff;
      transform: translateY(-2px);
    }

    .input-box i {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #00aaff;
      font-size: 20px;
      transition: all 0.3s ease;
    }

    .input-box input:focus + i {
      color: #80dfff;
      transform: translateY(-50%) scale(1.2);
    }

    .remember-forgot {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      font-size: 14px;
      color: #ccc;
    }

    .remember-forgot label input {
      margin-right: 5px;
    }

    .remember-forgot a {
      color: #00aaff;
      text-decoration: none;
      transition: color 0.3s;
    }

    .remember-forgot a:hover {
      color: #80dfff;
    }

    .btn {
      width: 100%;
      padding: 14px 0;
      border-radius: 12px;
      border: none;
      outline: none;
      background: linear-gradient(135deg,#00aaff,#80dfff);
      color: #0d1b2a;
      font-weight: bold;
      cursor: pointer;
      font-size: 18px;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      box-shadow: 0 8px 20px rgba(0,0,0,0.4);
      animation: btnPulse 2s infinite;
    }

    .btn:hover {
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 12px 25px rgba(0,0,0,0.6), 0 0 20px #00aaff, 0 0 20px #80dfff;
    }

    @keyframes btnPulse {
      0% { box-shadow:0 8px 20px rgba(0,0,0,0.4); }
      50% { box-shadow:0 12px 25px rgba(0,0,0,0.6), 0 0 25px #00aaff, 0 0 25px #80dfff; }
      100% { box-shadow:0 8px 20px rgba(0,0,0,0.4); }
    }

    .login-link-wrapper {
      text-align: center;
      margin-top: 20px;
    }

    .login-link {
      position: relative;
      text-decoration: none;
      color: #00aaff;
      font-weight: 600;
      transition: 0.3s;
    }

    .login-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      left: 0;
      bottom: -3px;
      background-color: #00aaff;
      transition: width 0.3s ease;
    }

    .login-link:hover {
      color: #80dfff;
    }

    .login-link:hover::after {
      width: 100%;
      background: #80dfff;
    }

    @keyframes floatForm{
      0%{ transform: translateY(0px); }
      50%{ transform: translateY(-10px); }
      100%{ transform: translateY(0px); }
    }

    @keyframes floatTitle{
      0%,100%{ transform:translateY(0);}
      50%{ transform:translateY(-6px);}
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

      <div class="login-link-wrapper">
        <a href="{{ route('loginpage') }}" class="login-link">Already have an account? Login</a>
      </div>
    </form>
  </div>
</body>
</html>
