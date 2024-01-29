<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Trang chủ admin</title>
   <link rel="shortcut icon" type="image/x-icon" href="../public/images/Logo.png">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../public/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../public/css/backend.css">
</head>

<body>
   <section class="hdl-header sticky-top">
      <div class="container-fluid h-100">
         <ul class="menutop">
            <li class="menutop-left">
               <a href="index.php" class="fs-5">
                  <i class="fa-brands fa-dashcube mx-2"></i> Shop Gear
               </a>
            </li>
            <li class="menutop-right">
               <div class="menutop-right__wrap">
                  <a href="">
                     <i class="fa fa-user mx-2" aria-hidden="true"></i>
                     <span class="d-inline-block fs-6" style="text-transform: uppercase;">
                        <?= $_SESSION['name'] ?? 'admin' ?>
                     </span>
                  </a>
                  <a href="logout.php">
                     <i class="fa-solid fa-power-off mx-2"></i>
                     <span style="text-transform: uppercase;">Thoát</span>
                  </a>
               </div>
            </li>
         </ul>
      </div>
   </section>
   <section class="hdl-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-2 bg-dark p-0 hdl-left">
               <div class="hdl-left">
                  <div class="dashboard-name">
                     Bản điều khiển
                  </div>
                  <nav class="m-2 mainmenu">
                     <ul class="main">
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Sản phẩm</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="index.php?opt=product">Tất cả sản phẩm</a>
                              </li>
                              <li>
                                 <a href="index.php?opt=category">Danh mục</a>
                              </li>
                              <li>
                                 <a href="index.php?opt=brand">Thương hiệu</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Bài viết</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="index.php?opt=post">Tất cả bài viết</a>
                              </li>
                              <li>
                                 <a href="index.php?opt=topic">Chủ đề</a>
                              </li>
                              <li>
                                 <a href="index.php?opt=page">Trang đơn</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Quản lý bán hàng</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="index.php?opt=order">Tất cả đơn hàng</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem">
                           <i class="fa-regular fa-circle icon-left"></i>
                           <a href="index.php?opt=customer">Khách hàng</a>
                        </li>
                        <li class="hdlitem">
                           <i class="fa-regular fa-circle icon-left"></i>
                           <a href="index.php?opt=contact">Liên hệ</a>
                        </li>
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Giao diện</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="index.php?opt=menu">Menu</a>
                              </li>
                              <li>
                                 <a href="index.php?opt=banner">Banner</a>
                              </li>
                           </ul>
                        </li>
                        <li class="hdlitem item-sub">
                           <i class="fa-brands fa-product-hunt icon-left"></i>
                           <a href="#">Hệ thống</a>
                           <i class="fa-solid fa-plus icon-right"></i>
                           <ul class="submenu">
                              <li>
                                 <a href="index.php?opt=user">Thành viên</a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
            <div class="col-md-10">