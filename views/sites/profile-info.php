<?php

use App\Models\User;

$user = User::find($_SESSION['user_id']);
$title = 'Thông tin tài khoản';
?>

<?php require_once 'views/sites/header.php' ?>

<main class="profile-page">
    <div class="container">
        <section class="breadcrumbs-wrap">
            <ul class="breadcrumbs-list">
                <li>
                    <a href="index.php">Trang chủ</a>
                    <span>&nbsp;/&nbsp;</span>
                </li>
                <li>
                    <a href="#">Tài khoản</a>
                </li>
            </ul>
        </section>
        <section class="profile-page__wrap">
            <div class="row">
                <div class="col-3">
                    <aside class="profile-page__sidebar">
                        <div class="sidebar-avatar">
                            <div class="sidebar-image">
                                <i class='bx bx-user-circle'></i>
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
                                <a href="#" class="active">
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
                                <a href="index.php?opt=profile&changepassword=true">
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
                    <article class="profile-page__info-detail">
                        <h2 class="box-heading">
                            Thông tin tài khoản
                        </h2>
                        <div class="box-content">
                            <div class="box-content__line">
                                <span class="box-content__title">
                                    Họ và tên
                                </span>
                                <span class="box-content__info">
                                    <?= $_SESSION['name'] ?? 'No Name' ?>
                                </span>
                            </div>
                            <div class="box-content__line">
                                <span class="box-content__title">
                                    Tên tài khoản
                                </span>
                                <span class="box-content__info">
                                    <?= $user->username ?? '' ?>
                                </span>
                            </div>
                            <div class="box-content__line">
                                <span class="box-content__title">
                                    Số điện thoại
                                </span>
                                <span class="box-content__info">
                                    <?= $user->phone ?? '' ?>
                                </span>
                            </div>
                            <div class="box-content__line">
                                <span class="box-content__title">
                                    Email
                                </span>
                                <span class="box-content__info">
                                    <?= $user->email ?? '' ?>
                                </span>
                            </div>
                            <div class="box-content__line">
                                <span class="box-content__title">
                                    Địa chỉ
                                </span>
                                <span class="box-content__info">
                                    <?= $user->address ?? '' ?>
                                </span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </div>
</main>

<?php require_once 'views/sites/footer.php' ?>