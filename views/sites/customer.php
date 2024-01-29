<?php
if (isset($_REQUEST['login'])) {
    require_once 'views/sites/customer-login.php';
}

if (isset($_REQUEST['logout'])) {
    unset($_SESSION['iscustomer']);
    unset($_SESSION['user_id']);
    unset($_SESSION['name']);
    unset($_SESSION['image']);
    header('location:index.php');
}

if (isset($_REQUEST['register'])) {
    require_once 'views/sites/customer-register.php';
}
