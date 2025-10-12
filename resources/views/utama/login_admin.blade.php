<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login - ANTREANKU</title>

    <!-- Custom fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-lg-5">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-4">

                    <!-- Judul -->
                    <div class="text-center mb-4">
                        <h1 class="h4 text-gray-900">Selamat Datang</h1>
                        <p>Dinas pendudukan dan pencatatan sipil
                            <br>Kabupaten ACEH TAMIANG
                        </p>
                    </div>

                    <!-- Alert error -->
                    @if(session()->has('loginError'))
                        <div class="alert alert-danger">
                            {{ session('loginError') }}
                        </div>
                    @endif

                    <!-- Form login -->
                    <form action="{{ route('login') }}" method="POST" class="user">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="username"
                                   class="form-control form-control-user"
                                   placeholder="Username" required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password"
                                   class="form-control form-control-user"
                                   placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>
    <h2>Login Admin</h2>

    @if(session('error'))
        <div style="color:red;">{{ session('error') }}</div>
    @endif
    @if($errors->any())
        <div style="color:red;">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="/login">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Login</button>
    </form>
</body>
</html>
