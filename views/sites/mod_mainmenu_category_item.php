<?php

use App\Models\Category;

$list_category_sub = Category::where([['parent_id', '=', $row_cat->id], ['status', '=', 1]])
    ->orderBy('sort_order', 'ASC')->get();
?>

<?php if (count($list_category_sub) > 0) : ?>
    <ul class="sub-menu">
        <?php foreach ($list_category_sub as $item_cate_sub) : ?>
            <li class="sub-item">
                <a href="index.php?opt=product&cat=<?= $item_cate_sub->slug ?>">
                    <?= $item_cate_sub->name ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>