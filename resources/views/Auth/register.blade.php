<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #e3f2fd, #bbdefb, #90caf9);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .wrapper {
      width: 400px;
      padding: 40px 30px;
      border-radius: 20px;
      background: rgba(255,255,255,0.35);
      backdrop-filter: blur(18px);
      box-shadow: 0 15px 35px rgba(0,0,0,0.25);
      animation: floatForm 2.5s ease-in-out infinite alternate;
    }

    h1 {
      text-align: center;
      color: #2196f3;
      margin-bottom: 30px;
      font-weight: 700;
      letter-spacing: 2px;
      text-shadow: 0 2px 8px rgba(0,0,0,0.2);
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
      background: rgba(255,255,255,0.6);
      color: #0d47a1;
      font-size: 16px;
      box-shadow: inset 0 0 8px rgba(0,0,0,0.15);
      transition: all 0.4s ease;
    }

    .input-box input::placeholder {
      color: #5c6bc0;
    }

    .input-box input:focus {
      background: #ffffff;
      box-shadow: 0 0 12px #64b5f6;
      transform: translateY(-2px);
    }

    .input-box i {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #2196f3;
      font-size: 20px;
      transition: all 0.3s ease;
    }

    .input-box input:focus + i {
      color: #64b5f6;
      transform: translateY(-50%) scale(1.2);
    }

    .remember-forgot {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      font-size: 14px;
      color: #1e3a8a;
    }

    .remember-forgot a {
      color: #2196f3;
      text-decoration: none;
    }

    .remember-forgot a:hover {
      color: #64b5f6;
    }

    .btn {
      width: 100%;
      padding: 14px 0;
      border-radius: 12px;
      border: none;
      outline: none;
      background: linear-gradient(135deg,#42a5f5,#90caf9);
      color: #0d47a1;
      font-weight: bold;
      cursor: pointer;
      font-size: 18px;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      box-shadow: 0 8px 18px rgba(0,0,0,0.25);
      animation: btnPulse 2s infinite;
    }

    .btn:hover {
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 12px 25px rgba(0,0,0,0.35), 0 0 18px #64b5f6;
    }

    .login-link-wrapper {
      text-align: center;
      margin-top: 20px;
    }

    .login-link {
      position: relative;
      text-decoration: none;
      color: #2196f3;
      font-weight: 600;
    }

    .login-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      left: 0;
      bottom: -3px;
      background-color: #2196f3;
      transition: width 0.3s ease;
    }

    .login-link:hover::after {
      width: 100%;
      background: #64b5f6;
    }

    @keyframes floatForm {
      0% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0); }
    }

    @keyframes floatTitle {
      0%,100% { transform: translateY(0); }
      50% { transform: translateY(-6px); }
    }
    /* ===== RESPONSIVE WRAPPER FIX ===== */
.wrapper {
  width: 100%;
  max-width: 420px;
  box-sizing: border-box;
}

/* ===== INPUT RESPONSIVE FIX ===== */
.input-box input {
  box-sizing: border-box;
  width: 100%;
  min-height: 52px;
}

/* ===== ICON PERFECT ALIGNMENT ===== */
.input-box i {
  pointer-events: none;
}

/* ===== MOBILE OPTIMIZATION ===== */
@media (max-width: 576px) {
  .wrapper {
    padding: 30px 20px;
    border-radius: 16px;
  }

  h1 {
    font-size: 24px;
    margin-bottom: 25px;
  }

  .input-box input {
    font-size: 14px;
    padding: 12px 42px 12px 14px;
    min-height: 48px;
  }

  .remember-forgot {
    flex-direction: column;
    gap: 8px;
    align-items: flex-start;
    font-size: 13px;
  }

  .btn {
    font-size: 16px;
    padding: 12px 0;
  }
}

/* ===== LARGE SCREENS SMOOTH LOOK ===== */
@media (min-width: 992px) {
  .wrapper {
    max-width: 450px;
  }
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
        @error('email')
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
        <label><input type="checkbox"> Remember me</label>
        <a href="#">Forgot Password?</a>
      </div>

      <button type="submit" class="btn">Register</button>

      <div class="login-link-wrapper">
        <a href="{{ route('loginpage') }}" class="login-link">
          Already have an account? Login
        </a>
      </div>
    </form>
  </div>
</body>
</html>
