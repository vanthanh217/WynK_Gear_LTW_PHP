<?php

use App\Models\User;

if (isset($_REQUEST['REGISTER'])) {
    $customer = new User();
    $customer->name = $_REQUEST['name'];
    $customer->email = $_REQUEST['email'];
    $customer->phone = $_REQUEST['phone'];
    $customer->username = $_REQUEST['username'];
    $customer->password = sha1($_REQUEST['password']);
    $customer->address = $_REQUEST['address'];
    $customer->image = null;
    $customer->roles = 1;
    $customer->created_at = date('Y-m-d H:i:s');
    $customer->created_by = $_SESSION['user_id'] ?? 1;
    $customer->status = 1;

    $customer->save();
    header('location: index.php?opt=customer&login=true');
}
$title = 'Đăng xuất';
?>

<?php require_once 'views/sites/header.php' ?>

<main class="register-page">
    <form action="index.php?opt=customer&register=true" method="post">
        <div class="container">
            <section class="breadcrumbs-wrap">
                <ul class="breadcrumbs-list">
                    <li>
                        <a href="index.php">Trang chủ</a>
                        <span>&nbsp;/&nbsp;</span>
                    </li>
                    <li>
                        <a href="#">Đăng ký</a>
                    </li>
                </ul>
            </section>
            <section class="register-page__wrap">
                <h1 class="register-page__wrap-title">
                    Đăng ký tài khoản
                </h1>
                <div class="register-form">
                    <div class="register-form__left">
                        <fieldset class="register-form__group">
                            <label for="name">Họ và tên</label>
                            <input type="text" autocomplete="off" name="name" id="name" placeholder="Họ và tên" class="register-form__control">
                        </fieldset>
                        <fieldset class="register-form__group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" autocomplete="off" name="phone" id="phone" placeholder="Số điện thoại" class="register-form__control">
                        </fieldset>
                        <fieldset class="register-form__group">
                            <label for="address">Địa chỉ</label>
                            <textarea id="address" name="address" placeholder="Địa chỉ" class="register-form__control"></textarea>
                        </fieldset>
                    </div>
                    <div class="register-form__right">
                        <fieldset class="register-form__group">
                            <label for="username">
                                Tên tài khoản
                            </label>
                            <input type="text" name="username" placeholder="Tên tài khoản" autocomplete="off" class="register-form__control" id="username">
                        </fieldset>
                        <fieldset class="register-form__group">
                            <label for="email">
                                Email
                            </label>
                            <input type="email" name="email" placeholder="Email" autocomplete="off" class="register-form__control" id="email">
                        </fieldset>
                        <fieldset class="register-form__group">
                            <label for="password">
                                Mật khẩu
                            </label>
                            <input type="password" name="password" placeholder="Mật khẩu" autocomplete="off" class="register-form__control" id="password">
                        </fieldset>
                        <fieldset class="register-form__group">
                            <label for="confirm-password">
                                Xác nhận Mật khẩu
                            </label>
                            <input type="password" name="confirm-password" placeholder="Xác nhận Mật khẩu" autocomplete="off" class="register-form__control" id="confirm-password">
                        </fieldset>
                        <button type="submit" name="REGISTER" class="register-form__btn--submit btn--secondary">
                            Đăng ký
                        </button>
                    </div>
                </div>
                <!-- <div class="btn-social-register">
                    <p class="social-register__separate">
                        <span>Hoặc đăng ký bằng</span>
                    </p>
                    <a href="" class="social-register--google">
                        <i class='bx bxl-google'></i>
                        <span>Google</span>
                    </a>
                </div> -->
                <p class="register-page__wrap-bottom">
                    Bạn đã tài khoản
                    <a href="index.php?opt=customer&login=true" class="to-login">
                        Đăng nhập!
                    </a>
                </p>
            </section>
        </div>
    </form>
</main>

<?php require_once 'views/sites/footer.php' ?>