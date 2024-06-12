<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #ece6ee, #c9d2e3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            max-width: 400px;
            width: 100%;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            text-align: center;
            padding: 15px;
        }

        .form-control {
            border-radius: 30px;
            padding: 10px 15px;
        }

        .btn-primary {
            border-radius: 30px;
            padding: 10px;
        }

        .form-label {
            font-weight: bold;
        }

        .text-primary {
            color: #007bff !important;
        }

        .alert-danger {
            border-radius: 30px;
        }

        .mb-3 {
            position: relative;
        }

        .mb-3 i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #ccc;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Register</h3>
        </div>
        <div class="card-body">
            @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    <strong>Email sudah digunakan</strong>
                </div>
            @endif
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required aria-describedby="nameHelp" placeholder="Enter your name">
                    <i class="bi bi-person"></i>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required aria-describedby="emailHelp" placeholder="Enter your email">
                    <i class="bi bi-envelope"></i>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required aria-describedby="passwordHelp" placeholder="Enter your password">
                    <i class="bi bi-lock"></i>
                </div>
                <div class="d-grid mb-3">
                    <button class="btn btn-primary">Submit</button>
                </div>
                <div class="mb-3 text-center">
                    <a href="{{ route('login') }}" class="text-primary">Sudah Punya Akun?</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap Icons CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.js"></script>
</body>

</html>
