<?php

use App\Models\Category;
use App\Models\Product;

$list_catid = [];
array_push($list_catid, $row_cat->id);
$list_category1 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat->id]])
    ->get();
if (count($list_category1) > 0) {
    foreach ($list_category1 as $row_cat1) {
        array_push($list_catid, $row_cat1->id);
        $list_category2 = Category::where([
            ['status', '=', 1],
            ['parent_id', '=', $row_cat1->id]
        ])->get();
        if (count($list_category2) > 0) {
            foreach ($list_category2 as $row_cat2) {
                array_push($list_catid, $row_cat2->id);
            }
        }
    }
}

$list_product = Product::where('status', '=', 1)
    ->whereIn('category_id', $list_catid)
    ->orderBy('created_at', 'DESC')
    ->limit(10)->get();
?>
<?php if (count($list_product) != 0) : ?>
    <div class="products">
        <h3 class="product-title">
            <a href="index.php?opt=product&cat=<?= $row_cat->slug ?>">
                <?= $row_cat->name ?>
            </a>
            <div class="product-btn">
                <i class='bx bxs-chevron-left'></i>
                <i class='bx bxs-chevron-right'></i>
            </div>
        </h3>
        <div class="list-products">
            <?php foreach ($list_product as $product) : ?>
                <?php require('views/sites/product_item.php') ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>