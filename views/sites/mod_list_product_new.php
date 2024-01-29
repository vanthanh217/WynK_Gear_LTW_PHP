<?php

use App\Models\Product;

$list_product_new = Product::where('status', '=', 1)
    ->orderBy('created_at', 'DESC')
    ->limit(3)->get();
?>

<div class="product-new">
    <h3 class="product-new__heading">
        Sản phẩm mới
    </h3>
    <ul class="product-new__list">
        <?php foreach ($list_product_new as $item) : ?>
            <li class="product-new__group-item">
                <div class="product-new__item">
                    <div class="product-new__item-image">
                        <a href="index.php?opt=product&slug=<?= $item->slug ?>">
                            <img src="public/images/product/<?= $item->image ?>" alt="<?= $item->image ?>" class="product-new__item-thumb">
                        </a>
                    </div>
                    <div class="product-new__item-content">
                        <h2 class="product-new__item-name">
                            <a href="index.php?opt=product&slug=<?= $item->slug ?>">
                                <?= word_limit($item->name, 5) ?>
                            </a>
                        </h2>
                        <h3 class="product-new__item-price">
                            <?php if ($item->pricesale < $item->price) : ?>
                                <span class="sale-price">
                                    <?= number_format($item->pricesale) . 'đ' ?>
                                </span>
                                <span class="price">
                                    <del>
                                        <?= number_format($item->price) . 'đ' ?>
                                    </del>
                                </span>
                            <?php else : ?>
                                <span class="sale-price">
                                    <?= number_format($item->price) . 'đ' ?>
                                </span>
                            <?php endif; ?>
                        </h3>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>