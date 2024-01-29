<?php

use App\Models\Category;

$list_category = Category::where([['parent_id', '=', 0], ['status', '=', 1]])
    ->orderBy('sort_order', 'ASC')->get();
?>

<ul class="collection-list">
    <li class="item category-list">
        Danh mục sản phẩm
        <i class='bx bx-chevron-down dropdown'></i>
        <ul class="sub-list category-sub">
            <?php foreach ($list_category as $item) : ?>
                <li class="sub-item">
                    <a href="index.php?opt=product&cat=<?= $item->slug ?>">
                        <?= $item->name ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </li>
</ul>