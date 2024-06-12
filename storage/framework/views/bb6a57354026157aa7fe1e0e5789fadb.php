<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #ffffff, #c7cbd2);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            margin: 20px;
        }

        .card-header {
            background: none;
            border-bottom: none;
            text-align: center;
            padding: 20px;
        }

        .card-header img {
            max-width: 100px;
            margin-bottom: 10px;
        }

        .btn-primary {
            background: #6e8efb;
            border: none;
            transition: background 0.3s ease;
            padding: 10px;
            border-radius: 30px;
        }

        .btn-primary:hover {
            background: #a777e3;
        }

        .alert {
            border-radius: 10px;
        }

        .text-primary {
            color: #6e8efb !important;
            transition: color 0.3s ease;
        }

        .text-primary:hover {
            color: #a777e3 !important;
        }

        .form-control {
            border-radius: 30px;
            padding: 10px 15px;
        }

        .form-label {
            font-weight: bold;
        }

        @media (max-width: 576px) {
            .card-header img {
                max-width: 80px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8 col-10">
                <div class="card">
                    <div class="card-header">
                        <img src="<?php echo e(asset('images/m.png')); ?>" alt="Login">
                    </div>
                    <div class="card-body">
                        <?php if(Session::has('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <strong><?php echo e(Session::get('error')); ?></strong>
                        </div>
                        <?php endif; ?>
                        <form id="login-form" action="<?php echo e(route('login')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required
                                    aria-describedby="emailHelp" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required
                                    aria-describedby="passwordHelp" placeholder="Enter your password">
                            </div>
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="mb-3 text-center">
                                <a href="<?php echo e(route('register')); ?>" class="text-primary">Belum Punya Akun?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#login-form').on('submit', function (e) {
                // e.preventDefault(); // Jangan gunakan ini untuk form asli
                // Simulasi sukses login untuk demo, hapus bagian ini pada implementasi nyata
                // $('#alert-container').html('<div class="alert alert-success" role="alert"><strong>Login successful!</strong></div>');
            });

            // Animasi hover untuk button
            $('.btn-primary').hover(function () {
                $(this).css('background', '#a777e3');
            }, function () {
                $(this).css('background', '#6e8efb');
            });

            // Animasi hover untuk link
            $('.text-primary').hover(function () {
                $(this).css('color', '#a777e3');
            }, function () {
                $(this).css('color', '#6e8efb');
            });
        });
    </script>
</body>

</html>
<?php /**PATH C:\Users\ADMIN\Documents\admj\resources\views/login.blade.php ENDPATH**/ ?>