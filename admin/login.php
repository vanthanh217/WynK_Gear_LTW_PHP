<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/fontawesome/css/all.min.css">
</head>

<body class="hold-transition login-page">
    <style>
        body {
            background: linear-gradient(to right, #a8ff78, #78ffd6);
        }

        .login-wrap {
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .card {
            border-width: 2px;
        }

        .input-group-append {
            margin-right: 8px;
        }

        .form-control {
            border-radius: 6px !important;
        }
    </style>
    <?php
    require_once '../vendor/autoload.php';

    use App\Models\User;

    $err = '';
    if (isset($_REQUEST['LOGIN'])) {
        $username = $_REQUEST['username'];
        $password = sha1($_REQUEST['password']);
        $args = [
            ['password', '=', $password],
            ['roles', '=', 0],
            ['status', '=', 1]
        ];
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $args[] = ['email', '=', $username];
        } else {
            $args[] = ['username', '=', $username];
        }
        $user = User::where($args)->first();
        if ($user !== null) {
            $_SESSION['useradmin'] = $username;
            $_SESSION['user_id'] = $user->id;
            $_SESSION['name'] = $user->name;
            $_SESSION['image'] = $user->image;
            header('location:index.php');
        } else {
            $err = 'Tài khoản không hợp lệ!';
        }
    }
    ?>
    <div class="login-wrap">
        <div class="login-box">
            <div class="card">
                <div class="card-header text-center">
                    <h2>ĐĂNG NHẬP</h2>
                </div>
                <div class="card-body login-card-body">
                    <p class="login-box-msg text-danger"></p>
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <div class="input-group-text w-100 h-100">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập hoặc email" require>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <div class="input-group-text w-100 h-100">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" require>
                        </div>
                        <div class="row">
                            <div class="col-12 text-end">
                                <button type="submit" name="LOGIN" class="btn btn-primary btn-block">Đăng nhập</button>
                            </div>
                            <div class="col-12">
                                <?php if ($err != '') : ?>
                                    <p class="text-danger">
                                        <?= $err ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../public/jquery/jquery-3.7.0.min.js"></script>
    <script src="../public/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>