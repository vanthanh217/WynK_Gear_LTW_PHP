<?php

use App\Models\User;

$user = User::find($_SESSION['user_id']);
if (isset($_REQUEST['CHANGE'])) {
    $mess = '';
    $curr_pass = sha1($_REQUEST['currentpassword']);
    if ($curr_pass != $user->password)
        $mess = 'Nhập sai mật khẩu cũ!';
    else {
        $new_pass = sha1($_REQUEST['newpassword']);
        $re_new_pass = sha1($_REQUEST['confirm-newpassword']);
        if ($new_pass != $re_new_pass)
            $mess = 'Xác nhận mật khẩu mới sai!';
        else {
            $user->password = $new_pass;
        }

        $user->save();
        // New pass: 1->9
    }
    // if ($user->password == sha1('123456789')) echo "TRUE";
}
$title = 'Đổi mật khẩu';
?>

<?php require_once 'views/sites/header.php' ?>

<main class="changepass-page">
    <div class="container">
        <section class="breadcrumbs-wrap">
            <ul class="breadcrumbs-list">
                <li>
                    <a href="index.php">Trang chủ</a>
                    <span>&nbsp;/&nbsp;</span>
                </li>
                <li>
                    <a href="#">Đổi mật khẩu</a>
                </li>
            </ul>
        </section>
        <section class="changepass-page__wrap">
            <div class="row">
                <div class="col-3">
                    <aside class="changepass-page__sidebar">
                        <div class="sidebar-avatar">
                            <div class="sidebar-image">
                                <img src="public/images/user/<?= $_SESSION['image'] ?? 'default.jpg' ?>" alt="" class="sidebar-image__thumb">
                            </div>
                            <div class="sidebar-info">
                                <p class="customer-name">
                                    <?= $_SESSION['name'] ?? 'No Name' ?>
                                </p>
                                <p class="customer-phone">
                                    <?= $user->phone ?? '' ?>
                                </p>
                            </div>
                        </div>
                        <ul class="sidebar-list">
                            <li class="sidebar-item">
                                <a href="index.php?opt=profile&info=true">
                                    <i class="bx bx-user"></i>
                                    <span>Thông tin tài khoản</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#">
                                    <i class='bx bx-shopping-bag'></i>
                                    <span>Quản lý đơn hàng</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#">
                                    <i class='bx bx-heart'></i>
                                    <span>Sản phẩm đã thích</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="active">
                                    <i class='bx bx-revision'></i>
                                    <span>Đổi mật khẩu</span>
                                </a>
                            </li>
                            <li class="sidebar-item last">
                                <a href="index.php?opt=customer&logout=true">
                                    <i class='bx bx-log-out'></i>
                                    <span>Đăng xuất</span>
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>
                <div class="col-9">
                    <form action="index.php?opt=profile&changepassword=true" method="post">
                        <article class="changepass-page__info">
                            <h2 class="info-title">
                                Thay đổi mật khẩu
                            </h2>
                            <table class="change-info">
                                <tbody>
                                    <tr>
                                        <td>Mật khẩu cũ</td>
                                        <td>
                                            <input type="password" name="currentpassword" placeholder="Nhập mật khẩu cũ" id="currentpassword" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mật khẩu mới</td>
                                        <td>
                                            <input type="password" name="newpassword" placeholder="Nhập mật khẩu mới" id="newpassword" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Xác nhận mật khẩu</td>
                                        <td>
                                            <input type="password" name="confirm-newpassword" placeholder="Xác nhận mật khẩu" id="confirm-newpassword" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button type="submit" name="CHANGE" class="btn--submit btn--secondary">
                                                Cập nhật
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="err-mess">
                                <style>
                                    .err-mess {
                                        margin: 12px 0;
                                        font-size: 2.2rem;
                                        line-height: 140%;
                                        text-align: center;
                                        color: var(--rose);
                                    }
                                </style>
                                <?= $mess ?? '' ?>
                            </p>
                        </article>
                    </form>
                </div>
            </div>
        </section>
    </div>
</main>

<?php require_once 'views/sites/footer.php' ?>