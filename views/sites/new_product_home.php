<?php

use App\Models\Product;

$list_sale_product = Product::where([['status', '=', 1]])
    ->orderBy('created_at', 'DESC')
    ->limit(10)->get();
?>

<div class="sale-product__content list-products">
    <?php foreach ($list_sale_product as $product) : ?>
        <?php require('views/sites/product_item.php') ?>
    <?php endforeach; ?>
</div>