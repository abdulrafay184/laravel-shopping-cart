<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
/* Full page background gradient with animation */
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #d9f0ff, #eaf6ff);
    overflow: hidden;
}

/* Floating animated circles */
.intro::before, .intro::after {
    content: '';
    position: absolute;
    border-radius: 50%;
    background: rgba(0,170,255,0.2);
    animation: floatCircle 10s linear infinite;
    z-index: 0;
}

.intro::before {
    width: 300px;
    height: 300px;
    top: -100px;
    left: -100px;
}

.intro::after {
    width: 400px;
    height: 400px;
    bottom: -150px;
    right: -150px;
}

@keyframes floatCircle{
    0% { transform: translateY(0) rotate(0deg);}
    50% { transform: translateY(-40px) rotate(180deg);}
    100% { transform: translateY(0) rotate(360deg);}
}

.boxfather {
    position: relative;
    z-index: 1;
    animation: floatBox 3s ease-in-out infinite alternate;
}

@keyframes floatBox{
    0% { transform: translateY(0);}
    50% { transform: translateY(-10px);}
    100% { transform: translateY(0);}
}

.box {
    background: rgba(255,255,255,0.55);
    backdrop-filter: blur(12px);
    padding: 50px 40px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.box h3 {
    color: #007bff;
    font-size: 36px;
    font-weight: 700;
    letter-spacing: 2px;
    margin-bottom: 40px;
    text-shadow: 0 2px 8px rgba(0,0,0,0.2);
    animation: floatTitle 3s ease-in-out infinite;
}

@keyframes floatTitle{
    0%,100% { transform: translateY(0);}
    50% { transform: translateY(-8px);}
}

/* Buttons styling with hover animation */
.btn-outline-primary, .btn-outline-danger {
    width: 120px;
    margin: 10px;
    padding: 12px 0;
    font-weight: bold;
    border-width: 2px;
    border-radius: 12px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-outline-primary:hover {
    background: linear-gradient(135deg, #00aaff, #80dfff);
    color: #0d1b2a;
    box-shadow: 0 0 20px #00aaff, 0 0 30px #80dfff;
    transform: translateY(-3px) scale(1.05);
}

.btn-outline-danger:hover {
    background: linear-gradient(135deg, #ff6b6b, #ff8b8b);
    color: #fff;
    box-shadow: 0 0 20px #ff6b6b, 0 0 30px #ff8b8b;
    transform: translateY(-3px) scale(1.05);
}

</style>
</head>
<body>
<div class="intro">
  <div class="boxfather">
    <div class="box">
      <h3>WELCOME</h3>
      <div class="row">
        <div class="col-md-6 mt-3 offset-3">
            <a href="{{route('registerpage')}}" class='btn btn-outline-danger'>Register</a>
            <a href="{{route('loginpage')}}" class='btn btn-outline-primary'>Login</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
