<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Macaron - Register</title>
    <link rel="icon" href="{{url('/images/macaron icon.png')}}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="register">
    <main class="container-fluid d-flex justify-content-center align-items-center">
        <div class="mw-100 position-relative" style="width:400px;height:auto">
            <div style="height:80px"></div>
            <img class="position-absolute top-0 start-50 translate-middle-x" style="width:150px;" src="{{ url('/images/macaron logo.png') }}"  alt="Macaron logo">
            <div class="bg-white rounded-4 px-5 pb-5" style="padding-top:80px; box-shadow: 5px 7px 10px #545454;">
                <form action="{{route('store')}}" method="POST">
                    @csrf
                    <div class="form-outline mb-4">
                        <input type="text" name="name" class="form-control form-control-lg bg-light-subtle @error('name') is-invalid @enderror" placeholder="Username" value="{{old('name')}}"/>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <input type="email" name="email" class="form-control form-control-lg bg-light-subtle @error('email') is-invalid @enderror" placeholder="Email Address" value="{{old('email')}}"/>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline position-relative">
                        <input id="password" type="password" name="password" class="form-control form-control-lg bg-light-subtle @error('password') border border-danger @enderror" placeholder="Password" value="{{old('password')}}"/>
                        <i class="position-absolute top-50 end-0 pe-3 translate-middle-y bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-outline my-4 position-relative">
                        <input id="password2" type="password" class="form-control form-control-lg bg-light-subtle" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                        <i class="position-absolute top-50 end-0 pe-3 translate-middle-y bi bi-eye-slash" id="togglePassword2" style="cursor: pointer;"></i>
                    </div>

                    <div class="d-flex flex-column gap-3 justify-content-center mb-4">
                        <button type="submit" class="btn btn-lg rounded-pill btn-block" style="background-color:violet;color:white">Register</button>
                        <div class="text-center gap-1">
                            <span>Already have account?</span>
                            <a href="/login">Login</a>
                        </div>
                    </div>
                  </form>
            </div>
        </div>
    </main>
</body>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', () => {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        togglePassword.classList.toggle('bi-eye');
    });

    const togglePassword2 = document.querySelector('#togglePassword2');
    const password2 = document.querySelector('#password2');

    togglePassword2.addEventListener('click', () => {
        const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
        password2.setAttribute('type', type);
        togglePassword2.classList.toggle('bi-eye');
    });
</script>
</html>
