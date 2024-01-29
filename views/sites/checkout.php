<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Orderdetail;

$list_cart = Cart::cartContent();
$customer = User::where([['status', '=', 1], ['id', '=', $_SESSION['user_id']]])->first();

if (isset($_REQUEST['BUY']) && count($list_cart) > 0) {
    $order = new Order();
    if ($customer != null) {
        $order->user_id = $_SESSION['user_id'];
        $order->name = $customer->name;
        $order->phone = $customer->phone;
        $order->email = $customer->email;
        $order->address = $customer->address;
        $order->created_at = date('Y-m-d H:i:s');
        $order->status = 1;
        if ($order->save()) {
            foreach ($list_cart as $item) {
                $orderdetail = new Orderdetail();
                $orderdetail->order_id = $order->id;
                $orderdetail->product_id = $item['id'];
                $orderdetail->price = $item['price'];
                $orderdetail->qty = $item['qty'];
                $orderdetail->amount = $item['qty'] * $item['price'];
                $orderdetail->save();
            }
            unset($_SESSION['cart']);
            header('location: index.php?opt=cart');
        }
    }
}
$title = 'Thanh toán';
?>

<?php require_once 'views/sites/header.php' ?>

<main class="checkout-page">
    <form action="index.php?opt=checkout" method="post">
        <div class="container">
            <section class="breadcrumbs-wrap">
                <ul class="breadcrumbs-list">
                    <li>
                        <a href="index.php">Trang chủ</a>
                        <span>&nbsp;/&nbsp;</span>
                    </li>
                    <li>
                        <a href="#">Thanh toán</a>
                    </li>
                </ul>
            </section>
            <section class="checkout-page__wrap">
                <div class="cart-info">
                    <div class="form-wrap">
                        <h2 class="form-wrap__title">
                            Thông tin giao hàng
                        </h2>
                        <div class="cart-info__separate"></div>
                        <p style="margin-bottom: 16px; text-align: center; font-size: 2rem;">
                            Bạn có tài khoản chưa?
                            <a href="index.php?opt=customer&login=true" style="color: var(--primary-color);">
                                Đăng nhập
                            </a>
                        </p>
                        <?php if (isset($_SESSION['iscustomer'])) : ?>
                            <div class="form-wrap__content">
                                <fieldset class="form-group">
                                    <input type="text" autocomplete="off" name="name" value="<?= $customer->name ?>" id="name" placeholder="Họ và tên" class="form-control" readonly>
                                </fieldset>
                                <fieldset class="form-group">
                                    <input type="text" autocomplete="off" name="phone" value="<?= $customer->phone ?>" id="phone" placeholder="Số điện thoại" class="form-control" readonly>
                                </fieldset>
                                <fieldset class="form-group">
                                    <input id="address" name="address" value="<?= $customer->address ?>" placeholder="Địa chỉ" class="form-control" readonly>
                                </fieldset>
                            </div>
                            <div class="payment-box">
                                <h2 class="payment-box__header">
                                    Chọn phương thức thanh toán
                                </h2>
                                <div class="cart-info__separate"></div>
                                <div class="payment-box__content">
                                    <fieldset class="radio-wrap">
                                        <input type="radio" name="paymentchecked" value="1" id="check-1">
                                        <span class="checkmark"></span>
                                        <label for="check-1">Thanh toán khi nhận hàng</label>
                                    </fieldset>
                                    <fieldset class="radio-wrap">
                                        <input type="radio" name="paymentchecked" value="2" id="check-2">
                                        <span class="checkmark"></span>
                                        <label for="check-2">Chuyển khoản qua ngân hàng</label>
                                    </fieldset>
                                    <div class="bank-info">
                                        <p>Ngân hàng: Techcombank</p>
                                        <p>STK: 024683579</p>
                                        <p>Chủ TK: Nguyễn Văn Thành</p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="cart-info__separate"></div>
                    <h2 class="cart-info__sub-heading">
                        Thông tin sản phẩm
                    </h2>
                    <div class="cart-info__list">
                        <?php foreach ($list_cart as $item) : ?>
                            <?php $total_price_item = $item['qty'] * $item['price']  ?>
                            <article class="cart-item">
                                <a href="index.php?opt=product&slug=<?= str_slug($item['name']) ?>">
                                    <img src="public/images/product/<?= $item['image'] ?>" alt="
                                    <?= $item['image'] ?>" class="cart-item__thumb">
                                </a>
                                <div class="cart-item__content">
                                    <div class="cart-item__content-left">
                                        <h3 class="cart-item__title">
                                            <a href="index.php?opt=product&slug=<?= str_slug($item['name']) ?>">
                                                <?= $item['name'] ?>
                                            </a>
                                        </h3>
                                        <p class="cart-item__price-wrap">
                                            <?= number_format($item['price']) ?> đ |
                                            <span class="cart-item__status">
                                                In stock
                                            </span>
                                        </p>
                                    </div>
                                    <div class="cart-item__content-right">
                                        <p class="cart-item__total-price">
                                            <?= number_format($total_price_item) ?>đ
                                        </p>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="payment-info">
                    <div class="payment-info__row">
                        <span>Số lượng:</span>
                        <span>
                            <?= number_format(Cart::cartCount()) ?>
                        </span>
                    </div>
                    <div class="payment-info__row">
                        <span>Tạm tính:</span>
                        <span>
                            <?= number_format(Cart::cartTotal()) ?>đ
                        </span>
                    </div>
                    <div class="payment-info__row">
                        <span>Phí vận chuyển:</span>
                        <span>-</span>
                    </div>
                    <div class="payment-info__separate"></div>
                    <div class="payment-info__coupon">
                        <input type="text" placeholder="Mã giảm giá" class="form-control">
                        <button class="payment-info__coupon-btn btn--secondary">Sử dụng</button>
                    </div>
                    <div class="payment-info__row">
                        <span>Tổng tiền:</span>
                        <span>
                            <?= number_format(Cart::cartTotal()) ?>đ
                        </span>
                    </div>
                    <button type="submit" name="BUY" class="payment-info__btn--submit btn--secondary">
                        Xác nhận
                    </button>
                </div>
            </section>
        </div>
    </form>
</main>

<?php require_once 'views/sites/footer.php' ?>