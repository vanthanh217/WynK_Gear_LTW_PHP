<div class="card">
    <div class="card-image">
        <a href="index.php?opt=product&slug=<?= $product->slug; ?>">
            <img src="public/images/product/<?= $product->image; ?>" alt="" class="img-default">
        </a>
    </div>
    <div class="card-info">
        <h3 class="card-title">
            <a href="index.php?opt=product&slug=<?= $product->slug; ?>" title="">
                <?= $product->name; ?>
            </a>
        </h3>
        <div class="card-bottom">
            <div class="price-box">
                <?php if ($product->pricesale < $product->price) : ?>
                    <span class="price">
                        <?= number_format($product->pricesale) . 'đ' ?>
                    </span>
                    <del class="initial-price">
                        <?= number_format($product->price) . 'đ' ?>
                    </del>
                <?php else : ?>
                    <span class="price">
                        <?= number_format($product->price) . 'đ' ?>
                    </span>
                <?php endif; ?>
            </div>
            <div class="action-cart btn--secondary">
                <button class="action-cart__link" onclick="addCart(<?= $product->id; ?>)">
                    <span class="action-cart__title">
                        Thêm vào giỏ
                    </span>
                    <i class='bx bx-cart-alt'></i>
                </button>
            </div>
        </div>
    </div>
</div>