<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" >
    <script src="script.js"></script>
</head>
<body>
    <header style="height:80px">
        <a href="/">
            <img src="img/Img.jpg" class="regLogo" alt="Hotel Logo" style="margin-bottom: 125px;">
        </a>
        {{-- <nav class=""> --}}
            <div class="nav-register-form">
                <a href="/">Overview</a>
            </div>
            {{-- <a href="/register">Register</a> --}}
            {{-- <a href="/login">Login</a> --}}
            {{-- <a href="#booknow">Book Now</a> --}}
        {{-- </nav> --}}
        {{-- <a href="/register">Register</a>
        <a href="/login">Login</a> --}}
    </header>
    <div class="container">
        <div class="regContainer">
            <p class="reg-title">Register Here</p>
                    @if (Session::has('success'))

                     @endif

                      <form action="/register" method="POST" class="mx-1 mx-md-4" style="margin-top:60px">
                        @csrf
                        {{-- <div class="d-flex flex-row align-items-center mb-2">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example1c">Name<span class="text-danger">*</span></label>
                            <input type="text" value="{{old('name')}}" name="name" id="form3Example1c" class="form-control" />
                          </div>
                        </div>
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror --}}

                        <div class="d-flex flex-row align-items-center mb-2">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example1c">Username<span class="text-danger">*</span></label>
                              <input type="text" value="{{old('username')}}" name="username" id="form3Example1c" class="form-control" />

                            </div>
                        </div>
                        @error('username')
                            <p class="text-danger">{{$message}}</p>
                        @enderror


                        <div class="d-flex flex-row align-items-center mb-2">
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

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit" class="btn btn-lg btn-block">Register</button>
                        </div>

                        <input type="hidden" name="ref" value="register">

                      </form>

        </div>
        <div class="image">
            <img src="img/Left.jpg" width="420px" height="380px" alt="Left">
        </div>
    </div>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>
