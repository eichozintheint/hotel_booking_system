<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="loginbody">
    <header style="height:80px">
        <a href="/">
            <img src="img/Img.jpg" class="loginLogo" alt="Hotel Logo" style="margin-bottom: 125px;">
        </a>
        {{-- <nav class="nav-login-form"> --}}
            {{-- <a href="/">Overview</a> --}}
            {{-- <a href="/register">Register</a> --}}
            {{-- <a href="/login">Login</a> --}}
            {{-- <a href="#booknow">Book Now</a> --}}
        {{-- </nav> --}}
        {{-- <a href="/register">Register</a>
        <a href="/login">Login</a> --}}
    </header>

    <div class="login">
        <div class="loginpage-image">
            <img src="img/Royal.jpg" width="800px" height="550px" alt="Royal">
        </div>
        <div class="row">

            <div class="loginContainer">
                @if (Session::has('error'))
                <p class="text-danger">{{session('error')}}</p>
            @endif
                <form action="/" method="POST">
                    @csrf
                    <div class="d-flex flex-row align-items-center mb-2 mt-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example3c">Email<span class="text-danger">*</span></label>
                          <input type="email" value="{{old('email')}}" name="email" id="form3Example3c" class="form-control" />

                        </div>
                      </div>
                      @error('email')
                          <p class="text-danger">{{$message}}</p>
                      @enderror

                    <div class="d-flex flex-row align-items-center mb-3">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example4c">Password<span class="text-danger">*</span></label>
                          <input type="password" value="{{old('password')}}" name="password" id="form3Example4c" class="form-control" />

                        </div>
                      </div>
                      @error('password')
                          <p class="text-danger">{{$message}}</p>
                      @enderror

                    <button type="submit" class="btn btn-lg btn-block" style="background-color:#532700; color:#fff">Login</button>
                  </form>
            </div>
        </div>
    </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>
