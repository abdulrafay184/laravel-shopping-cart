<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style/welcome.css">
    <title>Document</title>
</head>
<body>
<div class="intro">
  <div class="black"></div>
  <div class="white"></div>
  <div class="boxfather">
    <div class="box">
      <h3>WELCOME</h3>
      <div class="row">
        <div class="col-md-6 mt-5 offset-4" class='box1'>
            <a href="{{route('registerpage')}}" class='btn btn-outline-danger'>Register</a>
            <a href="{{route('loginpage')}}"class='btn btn-outline-primary'>Login</a>
        </div>

      </div>
    </div>
  </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</div>
</body>
</html>
