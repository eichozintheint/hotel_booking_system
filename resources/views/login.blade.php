<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    <p class="text-danger">{{ session('error') }}</p>
                @endif
                <form action="/" method="POST">
                    @csrf
                    <div class="d-flex flex-row align-items-center mb-2 mt-4s">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw mt-4"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Email<span
                                    class="text-danger">*</span></label>
                            <input type="email" value="{{ old('email') }}" name="email" id="email"
                                class="form-control" />

                        </div>
                    </div>
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="d-flex flex-row align-items-center mb-3">
                        <i class="fas fa-lock fa-lg me-3 fa-fw mt-4"></i>
                        <div class="form-outline flex-fill mb-0 password-toggle">
                            <label class="form-label" for="form3Example4c">Password<span
                                    class="text-danger">*</span></label>
                            <input type="password" value="{{ old('password') }}" name="password" id="password"
                                class="form-control" />
                            <span class="toggle-icon" onclick="togglePasswordVisibility()">
                                <i class="fa-solid fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="btn btn-lg btn-block"
                        style="background-color:#532700; color:#fff">Login</button>
                </form>
                <div class="register">
                    <small>Don't have an account?|<a href="/register" style="color:#532700">Register</a></small>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const currentType = passwordInput.type;

            // Toggle the password input type between 'password' and 'text'
            passwordInput.type = currentType === 'password' ? 'text' : 'password';
        }
    </script>
</body>

</html>
