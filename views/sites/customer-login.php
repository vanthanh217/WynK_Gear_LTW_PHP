<?php

use App\Models\User;

if (isset($_REQUEST['LOGIN'])) {
    $username = $_REQUEST['username'];
    $password = sha1($_REQUEST['password']);
    $args = [
        ['password', '=', $password],
        ['status', '=', 1]
    ];
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $args[] = ['email', '=', $username];
    } else {
        $args[] = ['username', '=', $username];
    }
    $user = User::where($args)->first();
    if ($user !== null) {
        $_SESSION['iscustomer'] = $username;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['name'] = $user->name;
        $_SESSION['image'] = $user->image;
        header('location:index.php');
    } else {
        $err = 'Tài khoản không hợp lệ!';
    }
}
$title = 'Đăng nhập';
?>

<?php require_once 'views/sites/header.php' ?>

<main class="login-page">
    <form action="index.php?opt=customer&login=true" method="post">
        <div class="container">
            <section class="breadcrumbs-wrap">
                <ul class="breadcrumbs-list">
                    <li>
                        <a href="index.php">Trang chủ</a>
                        <span>&nbsp;/&nbsp;</span>
                    </li>
                    <li>
                        <a href="#">Đăng nhập</a>
                    </li>
                </ul>
            </section>
            <section class="login-page__wrap">
                <h1 class="login-page__wrap-title">
                    Đăng nhập tài khoản
                </h1>
                <div class="login-form__input">
                    <fieldset class="login-form__group">
                        <label for="username">
                            Tên đăng nhập
                        </label>
                        <input type="text" name="username" placeholder="Tên đăng nhập" autocomplete="off" class="login-form__control" id="username">
                    </fieldset>
                    <fieldset class="login-form__group">
                        <label for="password">
                            Mật khẩu
                        </label>
                        <input type="password" name="password" placeholder="Mật khẩu" autocomplete="off" class="login-form__control" id="password">
                    </fieldset>
                    <button name="LOGIN" class="login-form__btn--submit btn--secondary">
                        Đăng nhập
                    </button>
                </div>
                <!-- <div class="btn-social-login">
                    <p class="social-login__separate">
                        <span>Hoặc đăng nhập bằng</span>
                    </p>
                    <a href="" class="social-login--google">
                        <i class='bx bxl-google'></i>
                        <span>Google</span>
                    </a>
                </div> -->
                <p class="login-page__wrap-bottom">
                    Bạn chưa có tài khoản
                    <a href="index.php?opt=customer&register=true" class="to-register">
                        Đăng ký ngay!
                    </a>
                </p>
                <p style="
                margin-top: 16px; font-size: 1.8rem; line-height: 120%; text-align: center; color: var(--rose);">
                    <?= $err ?? '' ?>
                </p>
            </section>
        </div>
    </form>
</main>

<?php require_once 'views/sites/footer.php' ?>