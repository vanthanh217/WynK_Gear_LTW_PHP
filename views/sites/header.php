<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'WynK Gear' ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="public/images/Logo.png">
    <link rel="stylesheet" href="public/slick/slick.css">

    <link rel="stylesheet" href="public/css/frontend.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="public/boxicons-2.1.4/css/boxicons.min.css">
</head>

<body>
    <div class="overlay"></div>
    <header>
        <div class="wrapper">
            <div class="header-wrap">
                <div class="header-group animation-header" id="header-pc">
                    <a href="index.php" class="header-left" id="logo">
                        <!-- <span id="logo-text">WynK</span> -->
                        <img src="./public/images/WynK.png" alt="" id="logo-image">
                    </a>
                    <?php require_once('views/sites/mod_mainmenu.php') ?>
                    <?php require_once('views/sites/search.php') ?>
                    <div class="header-right">
                        <button id="search-mini-laptop">
                            <i class='bx bx-search'></i>
                        </button>
                        <div title="Dark mode" class="header-switch">
                            <i class='bx bx-moon'></i>
                        </div>
                        <div class="header-cart">
                            <a href="index.php?opt=cart" title="Giỏ hàng" class="header-cart__link">
                                <i class='bx bx-cart-alt'></i>
                                <span class="cart-counter" id="cart-qty">
                                    <?php
                                    echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                                    ?>
                                </span>
                            </a>
                        </div>
                        <div class="header-user">
                            <button title="Tài khoản" class="header-user__link">
                                <i class='bx bx-user'></i>
                            </button>
                            <?php if (isset($_SESSION['iscustomer'])) : ?>
                                <div class="user-profile">
                                    <a href="index.php?opt=profile&info=true" class="is-login">
                                        <span class="text-login">
                                            Xin chào
                                        </span>
                                        <span class="username-text">
                                            <?= $_SESSION['name'] ?>
                                        </span>
                                    </a>
                                    <div class="user-profile__separate"></div>
                                    <div class="user-profile__action">
                                        <i class='bx bx-revision'></i>
                                        <a href="index.php?opt=profile&changepassword=true">Đổi mật khẩu</a>
                                    </div>
                                    <div class="user-profile__action">
                                        <i class='bx bx-log-out'></i>
                                        <a href="index.php?opt=customer&logout=true">Đăng xuất</a>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="user-dropdown">
                                    <a href="index.php?opt=customer&login=true" class="login-btn">
                                        Đăng nhập
                                    </a>
                                    <hr>
                                    <a href="index.php?opt=customer&register=true" class="register-btn">
                                        Đăng kí
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div id="header-mb">
                    <a href="index.php" class="header-left" id="logo">
                        <img src="public/images/Logo_ngang.png" alt="" id="logo-image">
                    </a>
                    <div class="header-right">
                        <button class="show-search">
                            <i class='bx bx-search'></i>
                        </button>
                        <div class="header-cart">
                            <a href="index.php?opt=cart" title="Giỏ hàng" class="header-cart__link">
                                <i class='bx bx-cart-alt'></i>
                                <span class="cart-counter">0</span>
                            </a>
                        </div>
                        <button class="show-menu">
                            <i class='bx bx-menu-alt-right'></i>
                        </button>
                    </div>
                    <div id="search-mb">
                        <div class="search-mb__header">
                            <button class="back">
                                <i class='bx bx-arrow-back'></i>
                            </button>
                            <form action="" class="search-input">
                                <input type="text" placeholder="Bạn cần tìm gì?" autocomplete="off" class="text-search">
                                <button type="reset" class="btn--reset">
                                    <i class='bx bxs-x-circle'></i>
                                </button>
                                <button type="submit" class="btn-search">
                                    <i class='bx bx-search'></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="close-sidebar">
                            <i class='bx bx-x'></i>
                        </div>
                        <div class="sidebar-wrap">
                            <ul class="cate-list">
                                <li class="item">
                                    <span class="item-title">
                                        Danh mục
                                        <i class='bx bx-caret-down dropdown'></i>
                                    </span>
                                    <ul class="sub-list">
                                        <li class="sub-item">
                                            <a href="#">
                                                <label for="btn-1">
                                                    Gaming Gear
                                                    <i class='bx bx-caret-down'></i>
                                                </label>
                                            </a>
                                            <input type="checkbox" id="btn-1">
                                            <ul class="cat-2">
                                                <li class="cat-2__item">
                                                    <a href="#">Bàn phím cơ</a>
                                                </li>
                                                <li class="cat-2__item">
                                                    <a href="#">Tai nghe</a>
                                                </li>
                                                <li class="cat-2__item">
                                                    <a href="#">Chuột gaming</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-item">
                                            <a href="#">
                                                <label for="btn-2">
                                                    Bàn ghế
                                                    <i class='bx bx-caret-down'></i>
                                                </label>
                                            </a>
                                            <input type="checkbox" id="btn-2">
                                            <ul class="cat-2">
                                                <li class="cat-2__item">
                                                    <a href="#">Bàn phím cơ</a>
                                                </li>
                                                <li class="cat-2__item">
                                                    <a href="#">Tai nghe</a>
                                                </li>
                                                <li class="cat-2__item">
                                                    <a href="#">Chuột gaming</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-item">
                                            <a href="#">Phụ kiện máy tính</a>
                                        </li>
                                        <li class="sub-item">
                                            <a href="#">Trang trí</a>
                                        </li>
                                        <li class="sub-item">
                                            <a href="#">Loa, Micro, Webcam</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="item">
                                    <a href="#">Trang chủ</a>
                                </li>
                                <li class="item">
                                    <a href="index.php?opt=page&cat=gioi-thieu">Giới thiệu</a>
                                </li>
                                <li class="item">
                                    <a href="index.php?opt=post">Bài viết</a>
                                </li>
                                <li class="item">
                                    <a href="index.php?opt=contact">Liên hệ</a>
                                </li>
                            </ul>
                            <div class="sidebar-wrap__bottom">
                                <div class="cart-wrap">
                                    <a href="index.php?opt=cart">
                                        Giỏ hàng
                                        <i class='bx bx-cart-alt'></i>
                                    </a>
                                </div>
                                <div class="login-wrap">
                                    <a href="index.php?opt=customer&login=true">
                                        Đăng Nhập
                                        <i class='bx bx-user'></i>
                                    </a>
                                </div>
                                <div class="header-switch">
                                    <i class='bx bx-moon'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>