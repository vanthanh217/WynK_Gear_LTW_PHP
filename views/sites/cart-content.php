<?php
$list_cart = Cart::cartContent();
$title = 'Giỏ hàng';
?>

<?php require_once 'views/sites/header.php' ?>

<main class="cart-page">
    <form action="index.php?opt=cart&updatecart=true" method="post">
        <div class="container">
            <section class="breadcrumbs-wrap">
                <ul class="breadcrumbs-list">
                    <li>
                        <a href="index.php">Trang chủ</a>
                        <span>&nbsp;/&nbsp;</span>
                    </li>
                    <li>
                        <a href="#">Giỏ hàng</a>
                    </li>
                </ul>
            </section>
            <section class="cart-page__wrap">
                <div class="cart-info">
                    <div class="cart-info__list">
                        <?php if (count($list_cart) > 0) : ?>
                            <?php foreach ($list_cart as $item) : ?>
                                <?php $total_price_item = $item['qty'] * $item['price']  ?>
                                <article class="cart-item">
                                    <a href="index.php?opt=product&slug=<?= str_slug($item['name']) ?>">
                                        <img src="public/images/product/<?= $item['image'] ?>" alt="<?= $item['image'] ?>" class="cart-item__thumb">
                                    </a>
                                    <div class="cart-item__content">
                                        <div class="cart-item__content-left">
                                            <h3 class="cart-item__title">
                                                <a href="index.php?opt=product&slug=<?= str_slug($item['name']) ?>">
                                                    <?= $item['name'] ?>
                                                </a>
                                            </h3>
                                            <p class="cart-item__price-wrap">
                                                <?= number_format($item['price']) . 'đ' ?> |
                                                <span class="cart-item__status">
                                                    In stock
                                                </span>
                                            </p>
                                            <div class="cart-item__input qtyBox">
                                                <button type="button" class="cart-item__input-btn decrement" id="sub">
                                                    -
                                                </button>
                                                <input type="text" value="<?= $item['qty'] ?>" name="qty[<?= $item['id'] ?>]" id="qty qtyInput" class="
                                                cart-item__input-text qty quantityInput">
                                                <button type="button" class="cart-item__input-btn increment" id="add">
                                                    +
                                                </button>
                                            </div>
                                        </div>
                                        <div class="cart-item__content-right">
                                            <p class="cart-item__total-price">
                                                <?= number_format($total_price_item) . 'đ' ?>
                                            </p>
                                            <a href="index.php?opt=cart&deletecart=<?= $item['id'] ?>" class="cart-item__ctrl-btn">
                                                <i class='bx bx-trash'></i>
                                                Xóa
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <article class="cart-item">
                                <span class="no-product">Giỏ hàng trống</span>
                            </article>
                            <style>
                                .no-product {
                                    display: block;
                                    flex: 1;
                                    text-align: center;
                                    font-size: 2rem;
                                    line-height: 140%;
                                    font-weight: 500;
                                }
                            </style>
                        <?php endif; ?>
                    </div>
                    <div class="cart-info__bottom">
                        <button type="submit" class="updated-cart btn--secondary">
                            Cập nhật giỏ hàng
                        </button>
                        <div class="cart-info__bottom-wrap">
                            <div class="payment-info__row">
                                <span>Phí vận chuyển:</span>
                                <span>-</span>
                            </div>
                            <div class="payment-info__separate"></div>
                            <div class="payment-info__row payment-info__row--bold">
                                <span>Tổng tiền:</span>
                                <span>
                                    <?= number_format(Cart::cartTotal()) . 'đ' ?>
                                </span>
                            </div>
                        </div>
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
                        <span>Phí vận chuyển:</span>
                        <span>-</span>
                    </div>
                    <div class="payment-info__separate"></div>
                    <div class="payment-info__row">
                        <span>Tổng tiền:</span>
                        <span>
                            <?= number_format(Cart::cartTotal()) . 'đ' ?>
                        </span>
                    </div>
                    <a href="index.php?opt=checkout" class="payment-info__btn--link btn--secondary">
                        Thanh toán
                    </a>
                </div>
            </section>
        </div>
    </form>
</main>

<?php require_once 'views/sites/footer.php' ?>
<script>
    const addBtn = document.querySelectorAll('#add')
    const subBtn = document.querySelectorAll('#sub')
    for (let i = 0; i < addBtn.length; i++) {
        addBtn[i].addEventListener('click', () => {
            const qtyBox = addBtn[i].parentNode
            const input = qtyBox.childNodes[3]
            let qty = parseInt(input.value)
            qty = qty + 1
            input.value = qty
        })
    }
    for (let i = 0; i < subBtn.length; i++) {
        subBtn[i].addEventListener('click', () => {
            const qtyBox = subBtn[i].parentNode
            const input = qtyBox.childNodes[3]
            let qty = parseInt(input.value)
            if (qty > 0)
                qty = qty - 1
            input.value = qty
        })
    }
</script>